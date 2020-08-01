let endPoint = HOST_NAME + HOME_PATH + "api/app/perfil.php?action=";
let endPointU = HOST_NAME + HOME_PATH + "api/app/perfilUsuario.php?action=";
const dashboardUser = new Vue({
    el: "#dashboard",

    data() {
        return {
            redirect: HOST_NAME + HOME_PATH + "app/profile/edit/",
            newProfile: "Nuevo perfil",
            show: [],
            ShowShared: [],
            pag: 1,
            NUM_RESULTS: 3,
            pagC: 1,
            NUM_RESULTSC: 3,
            deleteText: "Eliminar",
            toSend: [],
            loading:
                '<div><i class="far fa-spinner-third icon-load primary-cl"></i></div>',
            sharedWith: [],
            upperSpace: " d-flex align-items-center justify-content-center",
            sharingStatus: "",
            textColor: "",
        };
    },
    created: function () {
        this.showprofiles();
        this.showprofilesShared();
    },
    mounted() {
        $(this.$refs.shareModal).on("hidden.bs.modal", this.clearShared);
    },
    methods: {

        createNewProfile: function () {
            this.newProfile = "Cargando...";
            axios.get(endPoint + "newProfile").then((response) => {
                this.newProfile = "Nuevo perfil";
                window.location =
                    this.redirect + response.data.id_perfil_medico;
                console.log(response.data[0].id_perfil_medico);
                console.log(response);
            });
        },

        showprofiles: function () {
            axios.get(endPointU + "getshowProfile").then((response) => {
                this.show = response.data.dataset;
            });
        },

        showprofilesShared: function () {
            axios.get(endPointU + "getshowProfileShared").then((response) => {
                this.ShowShared = response.data.dataset;
            });
        },

        redirectToEdit: function (parameter) {
            window.location = this.redirect + parameter;
        },

        clearShared: function () {
            this.sharedWith = {};
            this.loading =
                '<div><i class="far fa-spinner-third icon-load primary-cl"></i></div>';
            this.upperSpace =
                " d-flex align-items-center justify-content-center";
            this.$refs.email.value = "";
            this.emailExists = true;
            this.sharingStatus = "";
        },

        deleteProfile: function (type) {
            console.log(this.toSend);
            this.deleteText = "Eliminando...";
            let formData = this.toFormData(this.toSend);
            console.log(formData);
            axios
                .post(endPointU + "delete" + type + "Profile", formData)
                .then((response) => {
                    jsonResponse = response.data;
                    let value = "";
                    let modal = "";

                    switch (type) {
                        case "Own":
                            value = this.show
                                .map((e) => e.id_perfil_medico)
                                .indexOf(this.toSend.id_perfil_medico);
                            modal = "#eliminarperfil";
                            break;
                        case "Shared":
                            value = this.ShowShared.map(
                                (e) => e.id_perfil_medico
                            ).indexOf(this.toSend.id_perfil_medico);
                            modal = "#eliminarperfilcompartido";
                            break;
                    }

                    if (jsonResponse.status == true) {
                        if (type == "Own") this.show.splice(value, 1);
                        else this.ShowShared.splice(value, 1);
                        swal(1, jsonResponse.message, false, 0);
                    } else swal(2, jsonResponse.exception, false, 0);

                    this.deleteText = "Eliminar";
                    this.toSend = {};
                    $(modal).modal("hide");
                });
        },

        encapsulateId: function (key, param) {
            this.toSend[key] = param;
        },

        toFormData: function (obj) {
            var form_data = new FormData();
            for (var key in obj) {
                form_data.append(key, obj[key]);
            }
            return form_data;
        },

        getShares: function (key, param) {
            this.encapsulateId(key, param);
            this.refreshShares();
        },

        refreshShares: function () {
            let formData = this.toFormData(this.toSend);
            axios
                .post(endPointU + "getUsersSharedWith", formData)
                .then((response) => {
                    let jsonResponse = response.data;
                    if (jsonResponse.status != -1) {
                        if (jsonResponse.dataset.length) {
                            this.sharedWith = jsonResponse.dataset;
                            this.loading = "";
                            this.upperSpace = "";
                        } else {
                            this.loading = jsonResponse.message;
                        }
                    }
                });
        },

        deleteSharing: function (key, param) {
            this.encapsulateId(key, param);
            let formData = this.toFormData(this.toSend);

            axios
                .post(endPointU + "deleteSharedAccess", formData)
                .then((response) => {
                    let jsonResponse = response.data;
                    console.log(jsonResponse);
                    if (jsonResponse.status) {
                        this.sharedWith.splice(
                            this.sharedWith
                                .map((e) => e.id_usuario)
                                .indexOf(this.toSend.id_usuario),
                            1
                        );
                        swal(1, jsonResponse.message, false, 0);
                    } else swal(2, jsonResponse.exception, false, 0);
                });
        },

        validateEmail: function (email) {
            const regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (email && !(email === "")) {
                if (regEx.test(email)) {
                    this.textColor = "";
                    this.sharingStatus = "";
                    return true;
                } else {
                    this.textColor = "text-danger";
                    this.sharingStatus =
                        "Ingrese un correo electrónico válido.";
                }
            } else {
                this.textColor = "text-danger";
                this.sharingStatus = "Por favor rellena el campo.";
            }
            return false;
        },

        shareProfileWith: function () {
            let email = this.$refs.email.value;
            if (this.validateEmail(email)) {
                this.encapsulateId("email", email);
                let formData = this.toFormData(this.toSend);
                axios
                    .post(endPointU + "shareProfileWith", formData)
                    .then((response) => {
                        let jsonResponse = response.data;
                        console.log(jsonResponse);
                        switch (jsonResponse.status) {
                            case 1:
                                this.refreshShares();
                                this.textColor = "text-success";
                                this.sharingStatus = jsonResponse.message;
                                this.$refs.email.value = "";
                                break;
                            default:
                                this.textColor = "text-danger";
                                this.sharingStatus = jsonResponse.exception;
                                break;
                        }
                    });
            }
        },
    },
});

//<?= HOME_PATH ?>resources/images/default-perfil.svg
