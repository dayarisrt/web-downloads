<template>
    <div>
        <form action="">
            <div class="form-row">
                <label for="name">Nombre de tu catálogo:</label>
                <input type="text" id="name" class="form-control" v-model="form.name" placeholder="Ingrese el nombre">
            </div>
            <div class="form-row">
                <label for="slug">Slug:</label>
                <input type="text" id="slug" class="form-control" v-model="form.slug" placeholder="Ingrese el slug">
            </div>
            <div class="form-row">
                <label for="active">Activo:</label>
                <input type="text" id="active" class="form-control" v-model="form.active" placeholder="Indique si esta activo">
            </div><br>
            <button type="submit" class="btn btn-success">Crear catálogo</button>
        </form>
    </div>
</template>

<script>
export default{
    data(){
        return{
            form: new Form({
                name: '',
                slug: '',
                active: '',
            })
        }
    }
}

</script>