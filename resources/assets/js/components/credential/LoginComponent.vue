<template>
    <v-app>
        <v-container fluid fill-height>
            <v-layout align-center justify-center>
                <v-flex xs12 sm8 md4>
                    <v-card class="elevation-12">
                        <v-toolbar dark color="primary">
                            <v-toolbar-title>Thông tin đăng nhập</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-tooltip bottom>
                                <v-btn
                                    icon
                                    large
                                    target="_blank"
                                    slot="activator">
                                    <v-icon>fas fa-user-plus</v-icon>
                                </v-btn>
                                <span>Đăng ký người dùng</span>
                            </v-tooltip>
                        </v-toolbar>
                        <v-card-text>
                            <v-form v-model="valid" lazy-validation @submit.prevent="authenticate" ref="form" id="frmLogin">
                                <v-text-field prepend-icon="person" name="email" :rules="emailRules" label="Địa chỉ email" type="text" v-model="form.email" autocomplete="email"></v-text-field>
                                <v-text-field prepend-icon="lock" name="password" :rules="passwordRule" label="Mật khẩu" type="password" v-model="form.password" autocomplete="current-password"></v-text-field>
                            </v-form>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="primary" type="submit" :disabled="!valid || form.email=='' || form.password==''" form="frmLogin">Đăng nhập</v-btn>
                        </v-card-actions>
                    </v-card>
                    <app-alert :msgContent="authError" :typeMsg="'warning'" :timeout="3000" :snackbar="!!authError"></app-alert>
                </v-flex>
            </v-layout>
        </v-container>
    </v-app>
</template>

<script>
    
    import { mapGetters } from 'vuex';
    export default {
        name: "login",
        data () {
            return {
                valid: false,
                emailRules: [
                    v => !!v || 'Cần nhập địa chỉ email',
                    v => /.+@.+/.test(v) || 'Email phải hợp lệ'
                ],
                passwordRule: [
                    v => !!v || 'Yêu cầu nhập mật khẩu',
                    v => (v.length >= 6) || 'Mật khẩu ít nhất 6 ký tự'
                ],
                form: {
                    email: '',
                    password: ''
                }
            }
        },
        computed: {
            ...mapGetters({
                currentUser: 'currentUser',
                allowLinks: 'allowLinks',
                authError: 'authError',
                isLoading: 'isLoading',
                isLoggedIn: 'isLoggedIn',
            })
        },
        watch: {
            user (value) {
                if (value !== null && value !== undefined) {
                    this.$router.push('/')
                }
            }
        },
        methods: {
            authenticate() {
                this.$refs.form.validate()
                if (this.valid) {
                    this.$store.dispatch('login', this.$data.form).then(()=>{
                        this.$router.push({ path: '/admin-dashboard' }); // test demo
                    });
                }
            }
        }
    }
</script>
