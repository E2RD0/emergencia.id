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
            deleteText: "Eliminar",
            toSend: {},
            pag: 1,
            NUM_RESULTS: 3,
            pagC: 1,
            NUM_RESULTSC: 3,
            loading: '<div><i class="far fa-spinner-third icon-load primary-cl"></i></div>',
            sharedWith: [],
        };
    },
    created: function () {
        this.showprofiles();
        this.showprofilesShared();
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
        deleteProfile: function (type) {
            this.deleteText = "Cargando...";
            let formData = this.toFormData(this.toSend);
            console.log(formData);
            axios
                .post(endPointU + "delete" + type + "Profile", formData)
                .then((response) => {
                    jsonResponse = response.data;
                    let value = "";
                    let modal = "";

                    if (jsonResponse.status == true) {
                        if (type == "Own") {
                            value = this.show.indexOf(
                                this.toSend.id_perfil_medico
                            );
                            modal = "#eliminarperfil";
                            this.show.splice(value, 1);
                        } else {
                            value = this.ShowShared.indexOf(
                                this.toSend.id_perfil_medico
                            );
                            modal = "#eliminarperfilcompartido";
                            this.ShowShared.splice(value, 1);
                        }
                        swal(1, jsonResponse.message, false, 0);
                    } else swal(2, jsonResponse.exception, false, 0);

                    this.deleteText = "Eliminar";
                    this.toSend = {};
                    $(modal).modal("hide");
                });
        },
        encapsulateId: function (key, param) {

            this.toSend = { [key]: param };
            console.log(this.toSend);

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
            let formData = this.toFormData(this.toSend);
            axios
                .post(endPointU + "getUsersSharedWith", formData)
                .then((response) => {
                    let jsonResponse = response.data;
                    if (jsonResponse.status != -1) {
                        if (jsonResponse.dataset?.length) {
                            this.sharedWith = jsonResponse.dataset;
                            this.loading = '';
                        } else {
                            this.loading = jsonResponse.message;
                        }
                    }
                });
        },
        deleteSharing: function (param) {
            console.log(param);
        },
        shareProfileWith: function() {
            let email = this.$refs.email.value;
            console.log(email);
            this.encapsulateId('email', email);
            let formData = this.toFormData({ id_perfil_medico: email });
            console.log(formData);
            axios
                .post(endPointU + "shareProfileWith", formData)
                .then((response) => {
                    let jsonResponse = response.data;
                    console.log(jsonResponse);
                    if (jsonResponse.status == true) {
                        if (jsonResponse.dataset.length != 0) {
                            this.sharedWith = jsonResponse.dataset;
                        }
                    }
                });
        },
    },
});

//<?= HOME_PATH ?>resources/images/default-perfil.svg
