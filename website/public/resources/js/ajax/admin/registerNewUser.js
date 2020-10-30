const API = HOME_PATH + 'api/admin/user.php?action=';
const app = new Vue({
    el: '#app',
    data: {
        newUser: {
            name: "",
            lastname: "",
            email: "",
            telephone: "",
            password: "",
        }
    },
    methods: {
        registerNewUser() {
            var formData = app.toFormData(app.newUser);
            axios.post(`${API}reg_new_use`, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((res) => {
                    redirect('admin/user/login');
                })
        },
        toFormData: function(obj) {
            var form_data = new FormData();
            for (var key in obj) {
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
    },
})