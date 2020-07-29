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
            src: "https://boostlikes-bc85.kxcdn.com/blog/wp-content/uploads/2019/08/No-Instagram-Profile-Pic.jpg",
            dataProfile: {
                date: "",
                name: "",
                lastName: "",
                blood: "Seleccionar",
                donor: "Seleccionar",
                document: "",
                isssEstatus: "Seleccionar",
                weight: "",
                height: "",
                country: "Seleccionar",
                province: "Seleccionar",
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
            this.dataProfile.blood != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.donor != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.isssEstatus != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.blood != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.city != "Seleccionar" ?
                (value = value + 6.25) :
                "";
            this.dataProfile.province != "Seleccionar" ?
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
    watch: {},
    methods: {
        debounceSearch(event) {
            this.savingTxt = "Guardando";
            this.aaa =
                '<div><i class="far fa-spinner-third icon-load"></i></div>';
            clearTimeout(this.debounce);
            this.debounce = setTimeout(() => {
                this.savingTxt = "Guardado";
                this.aaa = "";
            }, 3000);
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
    },
});