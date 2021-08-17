<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title ">{{list.name}}'s Details </p>
                <button class="delete" aria-label="close" @click='close' ></button>
            </header>
            <section class="modal-card-body">

                <!-- Content ... -->
                <div class="field">

                    <label class="label">Name</label>
                    <div class="control has-icons-left has-icons-right">
                        <p>{{list.name}}</p>
                    </div>
                </div>

                <div class="field">
                    <label class="label">User Name</label>
                    <div class="control has-icons-left has-icons-right">
                       <p>{{list.user_name}}</p>
                  </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left has-icons-right">
                           <p>{{list.email}}</p>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Hobby</label>
                        <div class="control has-icons-left has-icons-right">
                            <p>{{list.hobby}}</p>
                        </div>
                    </div>
                </div>

            </section>
            <footer class="modal-card-foot">
                <button class="button" @click='close'>Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    props:['openmodal'],
    data(){
        return{
            list:''
        }
    },
    methods:{
        close(){
            this.$emit('closeRequest')
        },
    }
}
</script>
