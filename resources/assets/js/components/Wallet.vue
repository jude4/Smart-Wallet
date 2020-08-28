<template>
                       <v-card
                    class="mt-2 mx-auto"
                    max-width="400"
  >
                <v-sheet
                class="v-sheet--offset mx-auto mt-0"
                color="cyan"
                dark
                elevation="12"
                max-width="calc(100% - 32px)"
                >
                    <v-card color="cyan">
                        <v-card-title>
                            <h3><i class="fa fa-money"></i> Wallet</h3>
                        </v-card-title>
                        
                    </v-card>
                </v-sheet>

    <v-card-text class="pt-0">
      <div class="title font-weight-light mb-2"></div>
      <div class="subheading font-weight-light grey--text">
          <p>Account Name: {{ data.user.name }}</p>
          <p>Account Number: {{ data.account.account_number}}</p>
          <h1 class="display-1">Balance: ₦{{data.account_balance}} </h1>
      </div>
      <v-divider class="my-2"></v-divider>
      <v-icon
        class="mr-2"
        small
      >
        mdi-clock
      </v-icon>
      <span class="caption grey--text font-weight-light">last registration 26 minutes ago</span>
    </v-card-text>
  </v-card>
</template>

<script>
    export default {
        name: 'Wallet',
        props: ['user'],
        data () {
            return {
                data: [],
                user: null,
                id: this.user
            }
        },

        created () {
            this.getData()
        },

        methods: {
            getData() {
                // setInterval(function () {

                    axios.post('api/wallet', {
                    id: this.id
                }).then((response) => {
                    console.log(response.data)
                    this.data = response.data
                }).catch((err) => {
                    console.log(err)
                })
                // }.bind(this), 5000)
            }
        }

    }
</script>