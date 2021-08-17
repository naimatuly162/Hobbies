<template>
    <div>
        <nav class="panel column is-offset-2 is-8" >
            <p class="panel-heading " style="background-color: rgba(164,222,225,0.87); margin-bottom: 5px">User List
                <button class="button is-info is-pulled-right " @click="openAdd" >Add New</button>

            <span class="is-pulled-right" v-if="loading">
	    	<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
	    </span>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-primary" type="text" placeholder="Search" v-model="searchQuery">
                    <span class="icon is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span></p></div>

            <a class="panel-block" v-for="(item,key) in temp">
    <span class="column is-9">
       {{item.name}}
    </span>
                <span class="panel-icon column is-1">
      <i class="has-text-danger fa fa-trash" aria-hidden="true" @click="del(key,(item.id))"></i>
    </span>
                <span class="panel-icon column is-1">
      <i class="has-text-info fa fa-edit" aria-hidden="true" @click='openEdit(key,item.id)'></i>
    </span>
                <span class="panel-icon column is-1">
      <i class="has-text-primary fa fa-eye" aria-hidden="true" @click="openDisplay(key)"></i>
    </span>
            </a>
            <a>

<!--                <pagiantion :data="lists" @pagination-change-page="getData"></pagiantion>-->


            <div class="pagination" role="navigation" aria-label="pagination" style="margin-top: 5px">
                <a class="pagination-previous" title="This is the first page" disabled>Previous</a>
                <a class="pagination-next">Next page</a>
                <ul class="pagination-list">
                    <li>
                        <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 2">2</a>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 3">3</a>
                    </li>
                </ul>
            </div>

            </a>

        </nav>

        <Add :openmodal='addActive' @closeRequest='close'> </Add>
        <Display :openmodal='displayActive' @closeRequest='close'></Display>
        <Edit :openmodal='editActive' @closeRequest='close'></Edit>

    </div>
</template>
<script>
let Add =require('./Add.vue').default;
let Display=require('./Display.vue').default;
let Edit=require('./Edit.vue').default;

export default {
    components: {Add,Display,Edit},

    data(){
        return{
            addActive:'',
            displayActive:'',
            editActive:'',
            lists:{},
            errors:{},
            loading:false,
            searchQuery:'',
            temp:'',

        }
    },
    mounted(){
        axios.post('/getData')
            .then((response)=>this.lists = this.temp =response.data)
            .catch((error)=> this.errors = error.response.data.errors)
    },
    watch:{
        searchQuery(){
            if (this.searchQuery.length > 0) {
                this.temp = this.lists.filter((item) => {
                    return Object.keys(item).some((key)=>{
                        let string = String(item[key])
                        //console.log(string)
                        return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
                        // console.log(string)
                    })
                });
            }else{
                this.temp = this.lists
            }
        }
    },
    methods:{
        openAdd(){
            this.addActive='is-active';
        },
        openDisplay(key){
            this.$children[1].list= this.temp[key]
            this.displayActive='is-active';
        },

         openEdit(key){
             // console.log(this.$children);
             let obj= this.temp[key]
           // console.log(obj.hobby);
             obj.hobby= JSON.parse(obj.hobby)

             console.log(obj)
             this.$children[2].list = obj ;
             this.editActive = 'is-active';
        },
        close(){
            this.addActive= this.displayActive=this.editActive='';
        },

        del(key,id){
            if (confirm("Are you sure ?")) {

                axios.delete(`/hobbies/${id}`)
                    .then((response)=> {
                        this.lists.splice(key, 1)
                    })
                    .catch((error) => this.errors = error.response.data.errors)

            }
            console.log(`${key} ${id}`)
        },
       /* getData(page){
            if(typeof page=== 'undefined'){
                page=1;
            }
            this.$http.get('/api/hobbies?page=' + page)
            .then((response) =>{
                return response.json();
            }).then(data => {
                this.lists = data;
            });
        }*/

    }
}
</script>
