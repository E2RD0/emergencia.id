function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
let endPoint = HOST_NAME + HOME_PATH + "api/app/perfil.php?action=";
//console.log(HOME_PATH);
const newprofile = new Vue({
    el: "#newprofile",
    data() {
        return {
            redirect: HOST_NAME + HOME_PATH + "app/user/profiles",
            options: [
                { text: 'Si', value: true },
                { text: 'No', value: false },
            ],
            loaderTest: true,
            idToLoadEstastus: 0,
            delay: 1000,
            progress: 1,
            progresscolor: "",
            inputCounter: 0,
            valueSingleInput: 4.545454545454545,
            savingTxt: "Saved",
            aaa: "",
            blood: [],
            issEstatus: [],
            countryList: [],
            countrySelect: "Select",
            cityList: [],
            info: {
                idProfileToReceiveUpdates: 0
            },
            src: "https://boostlikes-bc85.kxcdn.com/blog/wp-content/uploads/2019/08/No-Instagram-Profile-Pic.jpg",
            dataProfile: {
                date: "",
                name: "",
                lastName: "",
                selectedIdBlood: "Select",
                donor: false,
                document: "",
                isssEstatusSelected: "Select",
                weight: "",
                height: "",
                country: "Select",
                province: "",
                city: "Select",
                direction: "",
                image: "https://boostlikes-bc85.kxcdn.com/blog/wp-content/uploads/2019/08/No-Instagram-Profile-Pic.jpg",
                selectedFile: null,
                idProfile: 0,
                list: true
            },
            messagesError: {
                nombreUsuario: "Name"
            },
            addNewContactForm: {
                name: "",
                telephone: "",
                relacion: "",
                email: "",
                direction: "",
                id_p_m: 0
            },
            addDoctorContact: {
                nombre: "",
                telefono: "",
                especialidad: "",
                id_perfil_medico: 0
            },
            addMedicacion: {
                nombre: "",
                dosis: "",
                frecuencia: "",
                notas: "",
                adjunto: "",
                id_perfil_medico: 0
            },
            addCondition: {
                condicion: "",
                notas: "",
                adjunto: "",
                id_medicacion: "Select",
                id_perfil_medico: 0
            },
            addAllergy: {
                alergia: "",
                reaccion: "",
                tratamiento: "",
                id_perfil_medico: 0
            },
            addProcedure: {
                procedimiento: "",
                fecha: "",
                hospital: "",
                adjunto: "",
                id_contacto_d: "",
                id_perfil_medico: 0
            },
            secure: {
                compania: "",
                num_identificacion: "",
                decucible: "",
                telefono: "",
                notas: "",
                adjunto: "",
                id_perfil_medico: 0
            },
            other: {
                clave: "",
                valor: "",
                id_perfil_medico: 0
            },
            addEmergencycontacts: [],
            timer: null,
            isFirstTime: true,
            test: "",
            getDoctorContact: [],
            getMedicacion: [],
            getCondition: [],
            //Ids para eliminar
            idToDeleteContact: { id: 0, text: "Eliminar" },
            idToDeleteContactDoctor: { id: 0, text: "Eliminar" },
            progresscolorText: "text-bar-one"
        };
    },
    created: function() {
        this.getBlood();
        this.getIsss();
        this.getCountry();
        this.getUri();
        this.getInformationToUpdate();
        this.getContacts();
        this.asignAllId();
        this.getDoctor();
        this.getM();
        this.getConditions();
    },
    computed: {
        calcProgressColor: function() {
            return this.calcProgress <= 25 ?
                (this.progresscolor = "progress-bar-first") :
                this.calcProgress <= 50 ?
                (this.progresscolor = "progress-bar-second") :
                this.calcProgress <= 75 ?
                (this.progresscolor = "progress-bar-third") :
                this.calcProgress <= 99 ?
                (this.progresscolor = "progress-bar-fourth") :
                this.calcProgress == 100 ?
                (this.progresscolor = "progress-bar-fifth") :
                "";
        },
        calcProgressColorText: function() {
            return this.calcProgress <= 25 ?
                (this.progresscolorText = "text-bar-one") :
                this.calcProgress <= 50 ?
                (this.progresscolorText = "text-bar-two") :
                this.calcProgress <= 75 ?
                (this.progresscolorText = "text-bar-three") :
                this.calcProgress <= 99 ?
                (this.progresscolorText = "text-bar-four") :
                this.calcProgress == 100 ?
                (this.progresscolorText = "text-bar-one") :
                "";
        },
        calcProgress: function() {
            let value = 0;
            this.dataProfile.name != "" ? (value = value + 4.545454545454545) : "";
            this.dataProfile.lastName != "" ? (value = value + 4.545454545454545) : "";
            this.dataProfile.document != "" ? (value = value + 4.545454545454545) : "";
            this.dataProfile.weight != "" ? (value = value + 4.545454545454545) : "";
            this.dataProfile.height != "" ? (value = value + 4.545454545454545) : "";
            this.addEmergencycontacts != "" ? (value = value + 4.545454545454545) : "";
            this.getDoctorContact != "" ? (value = value + 4.545454545454545) : "";
            this.getMedicacion != "" ? (value = value + 4.545454545454545) : "";
            this.dataProfile.donor != "Select" ?
                (value = value + 4.545454545454545) :
                "";
            this.dataProfile.isssEstatusSelected != "Select" ?
                (value = value + 4.545454545454545) :
                "";
            this.dataProfile.selectedIdBlood != "Select" ?
                (value = value + 4.545454545454545) :
                "";
            this.dataProfile.city != "Select" ?
                (value = value + 4.545454545454545) :
                "";
            this.dataProfile.province != "" ?
                (value = value + 4.545454545454545) :
                "";
            this.dataProfile.country != "Select" ?
                (value = value + 4.545454545454545) :
                "";
            this.dataProfile.direction != "" ? (value = value + 4.545454545454545) : "";
            this.dataProfile.date != "" ? (value = value + 4.545454545454545) : "";
            return Math.trunc(value);
        },
        calcDate: function() {
            fecha = this.dataProfile.date;
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            return isNaN(edad) ? "" : edad + " years,";
        },
        img: function() {
            //this.image = this.src;
            return this.src;
        },
    },
    watch: {
        countrySelect() {
            //console.log("Se realizo un cambio de país")
            this.dataProfile.country = this.countrySelect
            this.dataProfile.city = "Select";
            this.getCity();
        },
        dataProfile: {
            handler() {
                //const pattern = new RegExp('^[A-Z]+$', 'i');
                //this.dataProfile.name
                //messagesError.nombreUsuario

            },
            deep: true
        }
    },
    methods: {
        debounceSearch(event) {
            this.savingTxt = "Saving";
            this.aaa =
                '<div><i class="far fa-spinner-third icon-load"></i></div>';
            clearTimeout(this.debounce);
            this.debounce = setTimeout(() => {
                this.savingTxt = "Saved";
                //console.log("PATCH a la BD");
                this.updateInformation();
                this.aaa = "";
                //2.5 segundos para realizar actualización a la bd despues de terminar de escribir:)
            }, 2500);
        },
        onFileSelected: function(event) {
            this.selectedFile = event.target.files[0];
            this.showImage(this.selectedFile);
        },
        showImage: function(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.dataProfile.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        addContactFromForm: function() {
            this.addEmergencycontacts.push({
                name: this.addNewContactForm.name,
                relacion: this.addNewContactForm.relacion,
                telefono: this.addNewContactForm.telephone,
                email: this.addNewContactForm.email,
                direccion: this.addNewContactForm.direction,
            });
            this.addNewContactForm = [];
        },
        seleccionarSangre: function(recive) {
            //console.log(recive);
        },
        getBlood: function() {
            axios.get(endPoint + "getBlood").then((response) => {
                this.blood = response.data;
            });
        },
        getIsss: function() {
            axios.get(endPoint + "getIssEstatus").then((response) => {
                this.issEstatus = response.data;
            });
        },
        getCountry: function() {
            axios.get(endPoint + "getCountry").then((response) => {
                this.countryList = response.data;
            });
        },
        getCity: function() {
            axios.get(endPoint + "getCity&country=" + this.dataProfile.country).then((response) => {
                this.cityList = response.data;
                const param = this.cityList.find(countryEstatus => countryEstatus.id_pais_estado === this.idToLoadEstastus)
                    //console.log(param.id_pais_estado)
                this.dataProfile.city = param.id_pais_estado;
                this.loaderTest = false;
            });
        },
        toFormData: function(obj) {
            var form_data = new FormData();
            for (var key in obj) {
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
        updateInformation: function() {
            //console.log("Hi i´m a update method")
            var formData = this.toFormData(this.dataProfile);
            axios
                .post(endPoint + "updateProfile",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        console.log("Actualizado correctamente")
                    )
                );
        },
        getUri: function() {
            let url = location.href.split('/').pop();
            this.dataProfile.idProfile = url;
            this.addNewContactForm.id_p_m = url;
        },
        changeList: function() {
            //this.dataProfile.list ? this.dataProfile.list = false : this.dataProfile.list = true
        },
        getInformationToUpdate: function() {
            this.info.idProfileToReceiveUpdates = location.href.split('/').pop();
            //console.log("Hi i´m a receive method")
            var formData = this.toFormData(this.info);
            axios
                .post(endPoint + "showProfileAllInfo",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.prepareToShowInformation(response)
                    )
                );
        },
        prepareToShowInformation: function(res) {
            //console.log(res.data)
            //console.log(res.data[0].email)
            res.data[0].fecha_nacimiento == null ? this.dataProfile.date = "" : this.dataProfile.date = res.data[0].fecha_nacimiento;
            res.data[0].nombres == null ? this.dataProfile.name = "" : this.dataProfile.name = res.data[0].nombres;
            res.data[0].apellidos == null ? this.dataProfile.lastName = "" : this.dataProfile.lastName = res.data[0].apellidos;
            res.data[0].id_tipo_sangre == null ? this.dataProfile.selectedIdBlood = "Select" : this.dataProfile.selectedIdBlood = res.data[0].id_tipo_sangre;
            res.data[0].es_donador == true ? this.dataProfile.donor = true : this.dataProfile.donor = false;
            res.data[0].documento_identidad == null ? this.dataProfile.document = "" : this.dataProfile.document = res.data[0].documento_identidad;
            res.data[0].id_estado_isss == null ? this.dataProfile.isssEstatusSelected = "Select" : this.dataProfile.isssEstatusSelected = res.data[0].id_estado_isss;
            res.data[0].peso == null ? this.dataProfile.weight = "" : this.dataProfile.weight = res.data[0].peso;
            res.data[0].estatura == null ? this.dataProfile.height = "" : this.dataProfile.height = res.data[0].estatura;
            res.data[0].id_pais == null ? this.countrySelect = "Select" : this.countrySelect = res.data[0].id_pais;
            res.data[0].id_pais_estado == null ? this.idToLoadEstastus = "Select" : this.idToLoadEstastus = res.data[0].id_pais_estado;
            res.data[0].ciudad == null ? this.dataProfile.province = "" : this.dataProfile.province = res.data[0].ciudad;
            res.data[0].direccion == null ? this.dataProfile.direction = "" : this.dataProfile.direction = res.data[0].direccion;
            res.data[0].listado == null ? this.dataProfile.list = "" : this.dataProfile.list = res.data[0].listado;
            this.loaderTest = false;
        },
        closeProfile: function() {
            window.location = this.redirect;
        },
        //addNewContactForm
        getContacts: function() {
            var formData = this.toFormData(this.info);
            axios
                .post(endPoint + "showContact",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.addEmergencycontacts = response.data
                    )
                );
        },
        createNewContact: function() {
            var formData = this.toFormData(this.addNewContactForm);
            axios
                .post(endPoint + "newContact",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.getContacts(), this.addNewContactForm = [], this.asignAllId()
                    )
                );
        },
        asignAllId: function() {
            this.addDoctorContact.id_perfil_medico = location.href.split('/').pop();
            this.addMedicacion.id_perfil_medico = location.href.split('/').pop();
            this.addNewContactForm.id_p_m = location.href.split('/').pop();
            this.addCondition.id_perfil_medico = location.href.split('/').pop();
        },
        addDoctor: function() {
            var formData = this.toFormData(this.addDoctorContact);
            axios
                .post(endPoint + "addDoctor",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.getDoctor(), this.addDoctorContact = [], this.asignAllId()
                    )
                );
        },
        getDoctor: function() {
            var formData = this.toFormData(this.info);
            axios
                .post(endPoint + "getDoctor",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.getDoctorContact = response.data
                    )
                );
        },
        noNumbers: function() {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }
        },
        getM: function() {
            var formData = this.toFormData(this.info);
            axios
                .post(endPoint + "getMedication",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.getMedicacion = response.data
                    )
                );
        },
        addMedicament: function() {
            var formData = this.toFormData(this.addMedicacion);
            axios
                .post(endPoint + "addMedication",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.getM(), this.addMedicacion = [], this.asignAllId()
                    )
                );
        },
        getConditions: function() {
            var formData = this.toFormData(this.info);
            axios
                .post(endPoint + "loadCondition",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        this.getCondition = response.data
                    )
                );
        },
        addCon: function() {
            var formData = this.toFormData(this.addCondition);
            axios
                .post(endPoint + "addNewCondition",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        //console.log("adawdawdadwad")
                        this.getConditions()
                    )
                );
        },
        changeId: function(p) {
            console.log(p)
            this.idToDeleteContact.id = p
        },
        changeIdContactDoctor: function(p) {
            console.log(p)
            this.idToDeleteContactDoctor.id = p
        },
        deleteContact: function(parameter) {
            this.idToDeleteContact.text = "Loading..."
            var formData = this.toFormData(this.idToDeleteContact);
            axios
                .post(endPoint + "deleteContact",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        $("#eliminarContacto").modal("hide"),
                        this.idToDeleteContact.text = "Eliminar",
                        this.getContacts()
                    )
                );
        },
        deleteContactDoctor: function(parameter) {
            this.idToDeleteContactDoctor.text = "Loading..."
            var formData = this.toFormData(this.idToDeleteContactDoctor);
            axios
                .post(endPoint + "deleteContactDoctor",
                    formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }
                )
                .then(
                    response => (
                        $("#eliminarContactoDoctor").modal("hide"),
                        this.idToDeleteContactDoctor.text = "Eliminar",
                        this.getDoctor()
                    )
                );
        }
    },
});