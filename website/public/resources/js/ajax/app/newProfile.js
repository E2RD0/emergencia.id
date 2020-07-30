let endPoint = "http://localhost" + HOME_PATH + "api/app/perfil.php?action=";
console.log(HOME_PATH);
const newprofile = new Vue({
    el: "#newprofile",
    data() {
        return {
            options: [
                { text: 'Si', value: true },
                { text: 'No', value: false },
            ],
            delay: 1000,
            progress: 1,
            progresscolor: "",
            inputCounter: 0,
            valueSingleInput: 6.25,
            savingTxt: "Guardado",
            aaa: "",
            blood: [],
            issEstatus: [],
            countryList: [],
            countrySelect: "Seleccionar",
            cityList: [],
            src: "https://boostlikes-bc85.kxcdn.com/blog/wp-content/uploads/2019/08/No-Instagram-Profile-Pic.jpg",
            dataProfile: {
                date: "",
                name: "",
                lastName: "",
                selectedIdBlood: "Seleccionar",
                donor: false,
                document: "",
                isssEstatusSelected: "Seleccionar",
                weight: "",
                height: "",
                country: "Seleccionar",
                province: "",
                city: "Seleccionar",
                direction: "",
                image: "https://boostlikes-bc85.kxcdn.com/blog/wp-content/uploads/2019/08/No-Instagram-Profile-Pic.jpg",
                selectedFile: null,
                idProfile: 0,
                list: true
            },
            addNewContactForm: {
                name: "",
                telephone: "",
                relacion: "",
                email: "",
                direction: "",
            },
            addEmergencycontacts: [],
            timer: null,
            isFirstTime: true,
            test: "",
        };
    },
    mounted: function() {
        this.getBlood();
        this.getIsss();
        this.getCountry();
        this.getUri();
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
        calcProgress: function() {
            let value = 0;
            this.dataProfile.name != "" ? (value = value + 6.25) : "";
            this.dataProfile.lastName != "" ? (value = value + 6.25) : "";
            this.dataProfile.document != "" ? (value = value + 6.25) : "";
            this.dataProfile.weight != "" ? (value = value + 6.25) : "";
            this.dataProfile.height != "" ? (value = value + 6.25) : "";
            this.addEmergencycontacts != "" ? (value = value + 6.25) : "";
            this.dataProfile.donor != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.isssEstatusSelected != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.selectedIdBlood != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.city != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.province != "" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.country != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.direction != "" ? (value = value + 6.25) : "";
            this.dataProfile.date != "" ? (value = value + 6.25) : "";
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
            return isNaN(edad) ? "" : edad + " años,";
        },
        img: function() {
            //this.image = this.src;
            return this.src;
        },
    },
    watch: {
        countrySelect() {
            console.log("Se realizo un cambio de país")
            this.dataProfile.country = this.countrySelect
            this.dataProfile.city = "Seleccionar";
            this.getCity();
        }
    },
    methods: {
        debounceSearch(event) {
            this.savingTxt = "Guardando";
            this.aaa =
                '<div><i class="far fa-spinner-third icon-load"></i></div>';
            clearTimeout(this.debounce);
            this.debounce = setTimeout(() => {
                this.savingTxt = "Guardado";
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
            console.log(recive);
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
            console.log("Hi i´m a update method")
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
                        console.log("Se actualizo :)")
                    )
                );
        },
        getUri: function() {
            let url = location.href.split('/').pop();
            this.dataProfile.idProfile = url;
        },
        changeList: function() {
            //this.dataProfile.list ? this.dataProfile.list = false : this.dataProfile.list = true
        }
    },

});