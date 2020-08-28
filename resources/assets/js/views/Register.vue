<template>
    <v-container class="">
       <v-sheet
         class="pa-8 sheet mx-auto"
         data-aos="fade-up"
         color="grey lighten-3"
        max-width="600"
       >
       <h1 class="display-5 text-center" data-aos="fade-up">
				<span class="fa fa-money text-purple"></span><br>
                Sign-up to Smart-Wallet
       </h1>
            <v-card data-aos="fade-up" hover="true">
                <v-card-text>
                    <v-form method="POST" :action="route" v-model="formValidity">
                       <input type="hidden" name="_token" v-bind:value="token">
                        <v-row>
                            <v-col cols="12" sm="12" md="12">
                                <v-alert type="error" text="center" v-if="errors">
                                    <!-- <ul> -->
                                        <li v-for="(error, index) in errors" :key="index">{{error}}</li>
                                    <!-- </ul> -->
                                </v-alert>
                                <v-text-field
                                    type="text"
                                    v-model="name"
                                    outlined
                                    label="Name"
                                    name="name"
                                    prepend-icon="mdi-account"
                                    color="#334252"
                                    :rules="nameRules"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field
                                    type="email"
                                    v-model="email"
                                    outlined
                                    name="email"
                                    label="E-mail Address"
                                    prepend-icon="mdi-email"
                                    color="#334252"
                                    :rules="emailRules"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col class="d-flex" cols="12" sm="12" md="12">
                                <v-select
                                    name="bank_name"
                                    :items="items"
                                    outlined
                                    required
                                    v-model="bank"
                                    :rules="bankRules"
                                    prepend-icon="mdi-bank"
                                    label="Select your Bank"
                                ></v-select>
                            </v-col>

                            <v-col cols="12" md="12" sm="12">
                                <v-text-field
                                    v-model="account_number"
                                    name="account_number"
                                    label="Account Number"
                                    type="number"
                                    :rules="accountNoRules"
                                    outlined
                                    prepend-icon="mdi-secret"
                                >
                                </v-text-field>
                            </v-col>

                            <v-col cols="12" sm="12" md="12">
                                <v-text-field
                                    :type="showPassword ? 'text' : 'password'"
                                    v-model="password"
                                    outlined
                                    name="password"
                                    label="Password"
                                    prepend-icon="mdi-lock"
                                    :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                                    @click:append="showPassword = !showPassword"
                                    color="#334252"
                                    :rules="passwordRules"
                                    required
                                ></v-text-field>

                            </v-col>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field
                                    :type="showConfirmPassword ? 'text' : 'password'"
                                    v-model="password_confirmation"
                                    outlined
                                    name="password_confirmation"
                                    label="Confirm Password"
                                    prepend-icon="mdi-lock"
                                    :append-icon="showConfirmPassword ? 'mdi-eye' : 'mdi-eye-off'"
                                    @click:append="showConfirmPassword = !showConfirmPassword"
                                    color="#334252"
                                    :rules="confirmPasswordRules"
                                    required
                                ></v-text-field>

                            </v-col>

                          </v-row>

                            <v-card-actions>
                                <v-btn
                                    type="submit"
                                    width="100%"
                                    color="cyan lighten-2"
                                    dark
                                    :disabled="!formValidity"
                                >
                                    Signup
                                </v-btn>
                            </v-card-actions>


                    </v-form>
                </v-card-text>
            </v-card>
                <v-card-actions data-aos="fade-up" class="">
                    <router-link class="nav-link" :to="{ name: 'email' }">forgot your password?</router-link>
                    <v-spacer></v-spacer>
                   <router-link class="nav-link text-danger" :to="{ name: 'login' }">Sign-in</router-link>
                </v-card-actions>
       </v-sheet>
    </v-container>
</template>

<script>
    export default {
        name: 'RegisterForm',
        props: [
            'route',
            'token'
        ],
        data() {
            return {
                items: ['Zenith Bank', 'GTBank', 'Fidelity Bank'],
                showPassword: false,
                showConfirmPassword: false,
                name: '',
                nameRules: [
                    value => !!value || 'Name is reqired',
                    value => value.length > 3 || 'Minimum length is 3.',
                ],
                email: '',
                emailRules: [
                    value => !!value || 'Email is required.',
                    value => value.indexOf('@') !== 0 || 'Email should have a username.',
                    value => value.includes('@') || 'Email should include an @ symbol.',
                    value => value.indexOf('.') - value.indexOf('@') > 1 || 'Email should contain a valid domain.',
                    value => value.indexOf('.') <= value.length - 3 || 'Email should contain a valid domain extension.'
                ],
                password: '',
                passwordRules: [
                    value => !!value || 'Password is required.',

                    value => {
                        const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/
                        return (
                            pattern.test(value) || 'Min. 8 characters with at least one capital letter, a number and a special character.'

                        )
                    }

                ],
                password_confirmation: '',
                confirmPasswordRules: [
                    value => !!value || 'Confirm your password'
                ],
                errors: null,
                formValidity: false,

                bank: '',
                bankRules: [
                    value => !!value || 'This field is required.'
                ],
                account_number: '',
                accountNoRules: [
                    value => !!value || 'This field is required.',
                    value => value.length > 9 || 'Min. 10 number.',
                ]

            }
        },

        // methods: {
        //     register () {
        //         this.$store.dispatch('register', {
        //             name: this.name,
        //             email: this.email,
        //             password: this.password,
        //             password_confirmation: this.password_confirmation
        //         })
        //         .then( () => {
        //             this.$router.push({ name: 'home'})
        //         })
        //         .catch(err => {
        //             this.errors = err.response.data.errors
        //         })
        //     }
        // },



    }
</script>

<style scope>
    .sheet {
        margin-top: 140px;
    }
</style>
