let endPoint = "http://localhost" + HOME_PATH + "api/app/perfil.php?action=";
console.log(endPoint);
const newprofile = new Vue({
    el: "#newprofile",
    data() {
        return {
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
                donor: "Seleccionar",
                document: "",
                isssEstatusSelected: "Seleccionar",
                weight: "",
                height: "",
                country: "Seleccionar",
                province: "",
                city: "Seleccionar",
                direction: "",
                image: "",
                selectedFile: null,
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
                this.src = e.target.result;
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
    },
});