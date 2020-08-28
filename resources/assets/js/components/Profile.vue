<template>
    <div>
           
                        <h1 class="text-center">
                                Update Profile
                        </h1>
                    <v-card-text>
                    <p class="text-center">
                        <v-avatar size="80">
                        <img
                            :src="'/uploads/profile_pic/'+src"
                            alt="John">
                        </v-avatar>
                            
                    <v-file-input
                    type="file"
                    label="Click here to select image"
                    @change="updateHandler"
                    v-model="profile_pic"
                    >
                    
                        
                    </v-file-input>

                    </p>

                    </v-card-text>
            </div>

</template>

<script>
    export default {
        props: ['user'],
        data () {
            return {
                id: this.user,
                src: '',
                profile_pic: null
            }
        },

        created() {
                this.updateHandler()
        },

        methods: {
                updateHandler () {
                    // setInterval(function () {
                        
                    const formData = new FormData()
                    formData.append('id', this.id)
                    formData.append('profile_pic', this.profile_pic)

                    axios.post('/api/update/pic', formData).then ((response) => {
                        console.log(response.data)
                        this.src = response.data
                    }).catch ((err) => {
                        console.log(err)
                    })
                // }.bind(this), 5000);
                }
        }
    }
</script>