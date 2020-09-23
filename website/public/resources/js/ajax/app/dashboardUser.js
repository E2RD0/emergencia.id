const endPoint = HOST_NAME + HOME_PATH + "api/app/perfil.php?action=";
const endPointU = HOST_NAME + HOME_PATH + "api/app/perfilUsuario.php?action=";
const dashboardUser = new Vue({
    el: "#dashboard",

    data() {
        return {
            redirect: HOST_NAME + HOME_PATH + "app/profile/edit/",
            newProfile: "New profile",
            show: [],
            ShowShared: [],
            pag: 1,
            NUM_RESULTS: 3,
            pagC: 1,
            NUM_RESULTSC: 3,
            deleteText: "Delete",
            toSend: [],
            loading:
                '<div><i class="far fa-spinner-third icon-load primary-cl"></i></div>',
            sharedWith: [],
            upperSpace: " d-flex align-items-center justify-content-center",
            sharingStatus: "",
            textColor: "",
            uid: "",
            srcImage: "",
            showModal: true,
            nameModal: "",
            edadModal: "",
            ciudadModal: "",
            showButtonModal: true,
            generatingReport: false,
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
        imrpCode: function (id, n, a, edad, ciudad) {
            console.log(id);
            this.uid = id;
            this.srcImage =
                "https://chart.googleapis.com/chart?cht=qr&chl=" +
                this.uid +
                "&choe=UTF-8&chs=500";
            this.showModal = false;
            this.nameModal = n + " " + a;
            this.edadModal = edad;
            this.ciudadModal = ciudad;
        },

        dowloadQR: function () {
            this.showButtonModal = false;
            setTimeout(() => {
                window.print() = true;
            }, 0050);
            setTimeout(() => {
                this.showButtonModal = true;
            }, 1000);
        },

        getProfilesReport(event) {
            if (this.generatingReport === false) {
                this.generatingReport = true;
                if (event.target.tagName != 'BUTTON') event.target.parentElement.innerHTML =
                    '<i class="far fa-spinner-third icon-load ml-0"></i><p class="d-inline-block my-0 ml-2">Generating list</p>';
                else event.target.innerHTML =
                    '<i class="far fa-spinner-third icon-load ml-0"></i><p class="d-inline-block my-0 ml-2">Generating list</p>';
                axios
                    .get(endPoint + "reportePerfilesUsuario")
                    .then((response) => {
                        if (response.data.status == 1) {
                            fetchResource(HOST_NAME + response.data.file);
                        } else {
                            swal(2, response.data.exception);
                        }
                        this.generatingReport = false;
                            event.target.innerHTML =
                            '<i class="fas fa-list"></i><p class="d-inline-block my-0 ml-2">Profile list</p>';
                    });
            }
        },

        createNewProfile: function () {
            this.newProfile = "Loading...";
            axios.get(endPoint + "newProfile").then((response) => {
                this.newProfile = "New profile";
                window.location =
                    this.redirect + response.data.id_perfil_medico;
                console.log(response.data[0].id_perfil_medico);
                console.log(response);
            });
        },

        getProfilePhoto: function (photo) {
            return HOME_PATH + "/resources/images/" + photo;
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
            this.deleteText = "Deleting...";
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

                    this.deleteText = "Delete";
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
                        if (this.sharedWith.length == 0) {
                            this.clearShared();
                            this.loading = "You share your profile with no one.";
                        }
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
                    this.sharingStatus = "Please enter a valid email address.";
                }
            } else {
                this.textColor = "text-danger";
                this.sharingStatus = "Please fill the field.";
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
