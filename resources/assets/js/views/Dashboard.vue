<template>
    <section class="w3l-index-block2 py-5 content">
        <v-container class="container py-md-3">
            <v-row>
                <v-col cols="12" md="6">
                    <Wallet :user="user" />

                    <v-card  class="mt-6 mx-auto justify-center" shaped=""
                        max-width="300" color="orange" elevation="4" >
                        <v-card-title>
                            <h1 class="display-1 text-white">
                                <v-icon color="white">mdi-phone</v-icon>USSD
                            </h1>
                        <v-subtitle class="text-white">Dial (*343#) for Transaction</v-subtitle>
                        </v-card-title>
                        <v-card-text>
                            <Dialog :user="user" />
                           
                        </v-card-text>
                    </v-card>
                </v-col>
               <v-col cols="12" md="6">
                   <v-card>
                       <v-card-text>
                        <Profile :user="user" />
                        <Form :user="user" />

                       </v-card-text>
                   </v-card>

               </v-col>
            </v-row>
            <v-divider></v-divider>
            <v-row>
                <v-col cols="12" md="12">
                    <h1 class="display-1">Transactions</h1>
                    <Transactions :user="user" />
                </v-col>
            </v-row>
        </v-container>

    </section>
</template>

<script>

import Wallet from '../components/Wallet'
import Profile from '../components/Profile'
import Form from '../components/Form'
import Transactions from '../components/Transactions'
import Dialog from '../components/Dialog'

export default {
    name: 'Dashboard',
    props: ['user'],
    components: {Wallet, Profile, Form, Transactions, Dialog},
    data() {
        return {

        }
    }
}

</script>

<style scoped>
    .content {
        margin-top: 90px;
    }
</style>
