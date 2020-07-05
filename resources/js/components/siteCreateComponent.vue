<template>
    <div>
        <form action="">
            <div class="form-row">
                <label for="name">Nombre del sitio:</label>
                <input type="text" id="name" class="form-control" v-model="form.name" placeholder="Ingrese el nombre">
            </div>
            <div class="form-row">
                <label for="url">URL:</label>
                <input type="text" id="url" class="form-control" v-model="form.url" placeholder="Ingrese la URL">
            </div>
            <div class="form-row">
                <label for="banner">Banner:</label>
                <input type="text" id="banner" class="form-control" v-model="form.banner" placeholder="Ingrese el banner">
            </div>
            <div class="form-row">
                <label for="logo">logo:</label>
                <input type="text" id="logo" class="form-control" v-model="form.logo" placeholder="Ingrese el logo">
            </div>
            <div class="form-row">
                <label for="footer">footer:</label>
                <input type="text" id="footer" class="form-control" v-model="form.footer" placeholder="Ingrese el footer">
            </div>
            <div class="form-row">
                <label for="email">email:</label>
                <input type="text" id="email" class="form-control" v-model="form.email" placeholder="Ingrese el email">
            </div>
            <div class="form-row">
                <label for="phone">telefono:</label>
                <input type="text" id="prone" class="form-control" v-model="form.phone" placeholder="Ingrese el teléfono">
            </div>
            <div class="form-row">
                <label for="active">active:</label>
                <input type="text" id="active" class="form-control" v-model="form.active" placeholder="Active">
            </div><br>
            <button type="submit" class="btn btn-success">Resgistrar sitio</button>
        </form>
    </div>
</template>

<script>
export default{
    data(){
        return{
            form: new Form({
                name: '',
                url: '',
                banner: '',
                logo: '',
                footer: '',
                email: '',
                phone: '',
                active: '',
            })
        }
    }
}

</script>