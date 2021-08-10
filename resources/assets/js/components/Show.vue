<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title ">Add New Hobbies</p>
                <button class="delete" aria-label="close" @click='close' ></button>
            </header>
            <section class="modal-card-body">

                <!-- Content ... -->
                <div class="field">

                    <label class="label">Name</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input"  type="text" placeholder="name">
                        <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
                    </div>
                </div>

                <div class="field">

                    <label class="label">User Name</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input"  type="text" placeholder="user name">
                        <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
                    </div>
                </div>


                <div class="field">
                    <label class="label">Hobbies</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-success"  type="text"  placeholder="hobbies" >
                        <span class="icon is-small is-left">
            <i class="fa fa-phone-square"></i>
          </span>

                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-danger" type="email" placeholder="Email" value="hello@" >
                            <span class="icon is-small is-left">
      <i class="fa fa-envelope"></i>
    </span>
                        </div>

                    </div>
                </div>

                <!--EndContent -->
            </section>
            <footer class="modal-card-foot">
                <button class="button is-info" @click='save'>Save changes</button>
                <button class="button" @click='close'>Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
export  default{
    props:['openmodal']
}
</script>
