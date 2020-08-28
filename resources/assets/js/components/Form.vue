<template>
    <div>
      
                <v-alert type="success" v-if="message">{{message}}</v-alert>    
                <v-form @submit.prevent="updateProfile">
                    <v-text-field
                        outlined
                        label="Name"
                        required
                        v-model="name"
                        type="text"
                        :placeholder="user.name"
                        prepend-icon="mdi-account"
                       
                    ></v-text-field>
                    <v-text-field
                        outlined
                        label="Phone Number"
                        required
                        v-model="phone_number"
                        prepend-icon="mdi-phone"
                        type="number"
                        :placeholder="user.phone_no"
                        
                    ></v-text-field>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn
                            color="indigo"
                            dark
                            rounded
                            width="100%"
                            type="submit"
                            :disabled="loading"
                        >Update</v-btn>
                    </v-card-actions>
                </v-form>
          
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data () {
            return {
                id: this.user,
                name: null,
                phone_number: null,
                user: null,
                loading: false,
                message: null
                
            }
        },

        created () {
            this.getUser()
        },

        methods: {
            getUser() {
                axios.post('api/user', {
                    id: this.id
                }).then ((response) => {
                    console.log(response.data)
                    this.user = response.data
                }).catch((err) => {
                    console.log(err)
                })
            },

            updateProfile () {
                this.loading = true
                 axios.post('api/user/update', {
                    id: this.id,
                    name: this.name,
                    phone_number: this.phone_number
                }).then ((response) => {
                   
                    this.message = 'Profile Updated Successfully.'
              
                    this.loading = false
                    this.name = ''
                    this.phone_number = ''
                    console.log(response.data)
                    this.user = response.data
                     setInterval(function() {
                        this.message = ''
                              
                    }.bind(this), 5000);
                }).catch((err) => {
                    console.log(err)
                })
            }
        }
    }
</script>