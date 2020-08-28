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
                Login to Smart-Wallet
       </h1>
            <v-card data-aos="fade-up" hover="true">
                <v-alert type="error" v-if="emailErrorMessage && passwordErrorMessage">{{emailErrorMessage}} <br>{{passwordErrorMessage}}</v-alert>
                <v-alert type="error" v-if="emailErrorMessage && !passwordErrorMessage">{{emailErrorMessage}}</v-alert>
                <v-alert type="error" v-if="passwordErrorMessage && !emailErrorMessage">{{passwordErrorMessage}}</v-alert>

                <!-- <v-alert type="error" v-if="">{{passwordErrorMessage}}</v-alert> -->
                <v-card-text>
                    <v-form method="POST" :action="route">
                    <input type="hidden" name="_token" :value="token">
                        <v-row>
                            <v-col cols="12" sm="12" md="12">
                             
                                <v-text-field
                                    type="email"
                                    v-model="email"
                                    name="email"
                                   
                                    outlined
                                    label="E-mail Address"
                                    prepend-icon="mdi-email"
                                    color="#334252"
                                    :rules="[v => !!v || 'Email is required']"
                                    required
                                ></v-text-field>
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
                                    :rules="[v => !!v || 'Password is required']"
                                    required
                                ></v-text-field>
                                <v-checkbox
                                    label="Remeber Me"
                                    v-model="rememberMe">
                                </v-checkbox>
                            </v-col>

                          </v-row>

                            <v-card-actions>

                                <v-btn
                                    width="100%"
                                    color="cyan lighten-2"
                                    outlined
                                    dark
                                    type="submit"
                                >
                                    Login
                                </v-btn>
                            </v-card-actions>


                    </v-form>
                </v-card-text>
            </v-card>
                <v-card-actions data-aos="fade-up" class="">
                     <a class="nav-link" href="email">forgot your password?</a>
                    <v-spacer></v-spacer>
                   <a class="nav-link text-danger" href="register">Create Account</a>
                </v-card-actions>
       </v-sheet>
    </v-container>

</template>

<script>
    export default {
        name: 'Login',
        props: [
            'route',
            'token',
            'emailErrorMessage',
            'passwordErrorMessage'

        ],
        data() {
            return {
                showPassword: false,
                email: '',
                password: '',
                error: null,
            }
        },


    }
</script>

<style scope>
    .sheet {
        margin-top: 140px;
    }
</style>