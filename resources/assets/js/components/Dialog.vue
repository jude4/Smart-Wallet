
<template>
    <div>
        <v-btn
            rounded
            color="indigo"
            dark
            @click.stop="dialog = true"

        >
        Dial Code
        </v-btn>

        <v-dialog
            v-model="dialog"
            max-width="300"
            persistent

        >
            <v-card>

                <v-card-title class="subtitle">
                    Welcome to Smart Wallet.
                </v-card-title>
                <v-card-text>
                    <b>Choose from the options below:</b>
                    <ol>
                        <li>My Account</li>
                        <li>Transfer</li>
                    </ol>

                    <v-form>
                    <span v-if="error" class="text-danger">{{ error }}</span>
                    <v-text-field v-model="response" required type="number"></v-text-field>
                    <v-card-actions>
                        <v-btn text @click="dialog = false">Cancel</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn text
                            @click.prevent="DialFunc"
                        >Ok</v-btn>
                        </v-card-actions>
                    </v-form>

                        <v-dialog
                            v-model="dialogTwo"
                            max-width="300"
                            persistent="true"
                        >
                            <v-card>
                                    <v-card-title class="subtitle">
                                        Welcome to Smart Wallet.
                                    </v-card-title>
                                    <v-card-text>
                                        <b>Select Bank:</b>
                                        <ol>
                                            <li>Zenith Bank</li>
                                            <li>GTBank</li>
                                            <li>Fidelity</li>
                                        </ol>
                                    <v-form>
                                        <span v-if="error" class="text-danger">{{ error }}</span>
                                        <v-text-field v-model="bank_name" required type="number"></v-text-field>
                                        <v-card-actions>
                                            <v-btn text @click="dialogTwo = false">Cancel</v-btn>
                                            <v-spacer></v-spacer>
                                            <v-btn text
                                             @click.prevent="DialFunc"
                                            >Ok</v-btn>
                                        </v-card-actions>
                                    </v-form>
                                              <v-dialog
                                                v-model="dialogThree"
                                                max-width="300"
                                                persistent="true"
                                            >
                                                <v-card>
                                                        <v-card-title class="subtitle">
                                                            Welcome to Smart Wallet.
                                                        </v-card-title>
                                                        <v-card-text>

                                                        <v-form>
                                                             <span v-if="error" class="text-danger">{{ error }}</span>

                                                            <v-text-field label="Enter Amount" v-model="amount" required type="number"></v-text-field>
                                                            <v-card-actions>
                                                                <v-btn text @click="dialogThree = false">Cancel</v-btn>
                                                                <v-spacer></v-spacer>
                                                                <v-btn text
                                                                @click.stop="dialogThree = true"
                                                                @click="DialFunc"
                                                                >Ok</v-btn>

                                                            </v-card-actions>

                                                        </v-form>
                                            <v-dialog
                                                v-model="dialogMain"
                                                max-width="300"
                                                persistent="true"
                                            >
                                                <v-card>
                                                        <v-card-title class="subtitle">
                                                            Welcome to Smart Wallet.
                                                        </v-card-title>
                                                        <v-card-text>

                                                           <v-form>
                                                               <span class="text-danger">{{error}}</span>
                                                               <v-text-field
                                                                label="Enter Account number"
                                                                required v-model="account_number"></v-text-field>
                                                           </v-form>
                                                        </v-card-text>
                                                        <v-card-actions>
                                                            <v-btn text @click="dialogMain = false">Cancel</v-btn>
                                                            <v-spacer></v-spacer>
                                                            <v-btn text @click.stop="dialogMain = true" @click="DialFunc">Ok</v-btn>
                                                        </v-card-actions>
                                                    </v-card>
                                               </v-dialog>

                                                      <v-dialog
                                                v-model="dialogConfirm"
                                                max-width="300"
                                                persistent="true"
                                            >
                                                <v-card>
                                                        <v-card-title class="subtitle">
                                                            Welcome to Smart Wallet.
                                                        </v-card-title>
                                                        <v-card-text>
                                                            <p>
                                                                You about to transfer {{amount}}
                                                                to {{reciever}}.
                                                            </p>
                                                        </v-card-text>
                                                        <v-card-actions>
                                                            <v-btn text @click="dialogConfirm = false">Cancel</v-btn>
                                                            <v-spacer></v-spacer>
                                                            <v-btn text @click.stop="dialogConfirm = true" @click="DialFunc">Proceed</v-btn>
                                                        </v-card-actions>
                                                    </v-card>
                                               </v-dialog>

                                                        <v-dialog
                                                v-model="dialogFour"
                                                max-width="300"
                                                persistent="true"
                                            >
                                                <v-card>
                                                        <v-card-title class="subtitle">
                                                            Welcome to Smart Wallet.
                                                        </v-card-title>
                                                        <v-card-text>

                                                            <p>Success: You have successfully transfer {{amount}} to
                                                              </p>
                                                              <ul>
                                                                  <li>Account Name: {{reciever}}</li>
                                                                  <li>Account Number: {{ account_number}}</li>
                                                              </ul>
                                                        </v-card-text>
                                                        <v-card-actions>

                                                            <v-spacer></v-spacer>
                                                            <v-btn text 
                                                            @click="endSection" @click.stop="dialogFour = false">Ok</v-btn>
                                                        </v-card-actions>
                                                    </v-card>
                                               </v-dialog>

                                    </v-card-text>
                                </v-card>
                        </v-dialog>
                                        </v-card-actions>
                                    </v-card-text>
                                </v-card>
                        </v-dialog>

                    </v-card-actions>
                </v-card-text>
            </v-card>

        </v-dialog>
    </div>
</template>

<script>

import axios from 'axios'
import ProgressBar from './ProgressBar'

export default {
    props: ['user'],
    components: {ProgressBar},
    data () {
        return {
            dialog: false,
            dialogTwo: false,
            dialogThree: false,
            dialogMain: false,
            dialogConfirm: false,
            dialogFour: false,
            response: null,
            bank_name: null,
            amount: null,
            error: null,
            end_section: false,
            id: this.user,
            account_number: null,
            reciever: null,
            loading: false
        }
    },

    methods: {
        endSection() {
             if (this.dialogFour == true) {
                this.amount = ''
                this.reciever = ''
                this.account_number = ''
                return this.dialogFour = false
            }
        },

        DialFunc() {
            // Check if input field is empty
            if (this.response == null && this.dialog == true ) return this.error = 'This input field is required'
            if (this.bank_name == null && this.dialogTwo == true ) return this.error = 'This input field is required'
            if (this.amount == null && this.dialogThree == true ) return this.error = 'This input field is required'
            if (this.account_number == null && this.dialogMain == true ) return this.error = 'This input field is required'

            // Check for invalid input
            if (this.response > 2 && this.dialog == true)  {
                        this.response = ''
                return this.error = 'Invalid number. Try again'
            }

            if (this.bank_name > 3 && this.dialogTwo == true) {
                    this.bank_name = ''
                    return this.error = 'Invalid number. Try again'
            }


            // Check input field for next request dialog
            if (this.response == 2) {
                this.error = null
                this.dialogTwo = true
                this.dialog = false
                this.response = null

            }

            if (this.response == 1) {
                this.dialog = false
                this.response = null
                this.error = null

                // Api Post request to check for account balance
            }

            // Check input field for next request dialog(Enter Bank Name)
            if (this.bank_name == 1 || this.bank_name == 2|| this.bank_name == 3 ) {
                 this.dialogTwo = false
                 this.dialogThree = true
                 this.bank_name = null
                 this.error = null
            }

            // Check input field for next request dialog(Verify amount to Transfer)
            if (this.amount != null && this.amount < 1000 && this.dialogThree == true) {
                this.amount = ''
                return  this.error = 'Minimum amout to Transfer is #1,000 '
            }

            // Verify Account Number if it exists
            if (this.account_number != null && this.dialogMain == true) {

                // Call an API request
                axios.post('/api/verify', {
                    id : this.id,
                    amount: this.amount,
                    account_number: this.account_number,
                }).then ((response) => {
                        if (response.data == 'error') {
                            this.account_number = ''
                            return this.error = 'Account Number does not exist.'
                        } else {

                            this.reciever = response.data.reciever

                            this.dialogMain = false
                            this.dialogConfirm = true

                        }
                }).catch((err) => {
                    console.log(err)
                })

            }

            if (this.dialogConfirm == true) {
                axios.post('/api/proceed', {
                    id: this.id,
                    amount: this.amount,
                    account_number: this.account_number
                }).then ((response) => {
                    this.dialogConfirm = false
                    this.dialogFour = true
                    this.error = null
                })
            }


            // If amount to withdraw is greater than or equal to #1000
            if (this.amount != null && this.amount  >= 1000 && this.dialogThree == true ) {

                axios.post('/api/check_balance', {
                    id: this.id,
                    amount: this.amount
                }).then((response) => {

                    if (response.data == 'error') {
                        return this.error = 'Insufficient Balance'
                    } else {
                        this.dialogThree = false
                        this.dialogMain = true
                        this.error = null
                    }

                }).catch((err) => {
                    console.log(err)
                })

            }

         


        }
    }
}
</script>

<style>

</style>
