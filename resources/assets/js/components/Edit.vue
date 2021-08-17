<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Edit {{ list.name }}'s Details</p>
                <button class="delete" aria-label="close" @click='close'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="list.name">
                    </div>
                    <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
                </div>

                <div class="field">
                    <label class="label">User name</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.user_name}" type="text" placeholder="User Name" v-model="list.user_name">
                    </div>
                    <small v-if="errors.user_name" class="has-text-danger">{{ errors.user_name[0] }}</small>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Email" v-model="list.email">
                    </div>
                    <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
                </div>

                <div class="field">
                    <label class="label">Hobby</label>

                    <div class="control">

                        <input type="checkbox" value="music" id="music" v-model="list.hobby">
                        <label for="music">Music</label>

                        <input type="checkbox" value="planting" id="planting" v-model="list.hobby">
                    <label for="planting">Planting</label>

                    <input type="checkbox"  value="travelling" id="travel" v-model="list.hobby">
                    <label for="travel">Travelling</label>

                    <input type="checkbox"  value="photography" id="photography" v-model="list.hobby">
                    <label for="photography">Photography</label>

                    <input type="checkbox"  value="singing" id="singing" v-model="list.hobby">
                    <label for="singing">Singing</label>

                    <input type="checkbox" value="painting" id="painting" v-model="list.hobby">
                    <label for="painting">Painting</label>
                    <small v-if="errors.hobby" class="has-text-danger">{{ errors.hobby[0] }}</small>

                    </div>
                </div>

            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click='edit'>Update</button>
                <button class="button" @click='close'>Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
export default{
    props:['openmodal'],
    data(){
        return{

            list:{},
            errors:{}
        }
    },
    methods:{
        close(){
            this.$emit('closeRequest')
        },
        edit(){
          axios.patch(`/hobbies/${this.list.id}`, this.$data.list).then((response)=> {
                console.log(response)
                this.close()})
                .catch((error) => this.errors = error.response.data.errors)


        }
    }
}
</script>
