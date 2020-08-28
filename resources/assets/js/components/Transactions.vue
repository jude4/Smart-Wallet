<template>
  <v-data-table
    :headers="headers"
    :items="items"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
</template>


<script>
  export default {

    props: ['user'],
    data () {
      return {
        id: this.user,
        headers: [
          {
         
            align: 'start',
            sortable: false,
            value: 'name',
          },
          { text: 'Sender', value: 'users.name' },
          { text: 'Reciepent', value: 'sender_id'},
          { text: 'Amount', value:  'amount'},
          { text: 'Transaction Type', value: 'transaction_type' },
          { text: 'Date', value: 'created_at' },
        ],
        items: []
        
      }
    },

    created () {
      this.getTransactions()
    },

    methods: {
      getTransactions() {
        // setInterval(function () {
        axios.post('api/transaction', {
          id: this.id
        }).then ((response) => {
            console.log(response.data)
            this.items = response.data
        }).catch ((err) => {
          console.log(err)
        })
          
        // }.bind(this), 5000);
      }
    }
  }
</script>