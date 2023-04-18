<template>
    <div class="card">
        <div class="card-header">
            <h2>Publicado {{ pensamiento.fecha }}</h2>
        </div>
        <div class="card-body">
            <input v-if="edit" type="text" name="" id="" class="form-control" v-model="pensamiento.descripcion">
            <p v-else>{{ pensamiento.descripcion }}</p>
        </div>

        <div class="card-footer">
            <button v-if="edit" class="btn btn-secondary" @click="onClickUpdate">Guardar Cambios</button>
            <button v-else class="btn btn-secondary" @click="onEdit">Editar</button>
            <button class="btn btn-danger" @click="onDelete()">Eliminar</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['pensamiento'],
    data() {
        return {
            edit: false
        }
    },
    methods: {
        async onDelete() {
            let req = await axios.delete(`/pensamientos/${this.pensamiento.id}`)
            console.log(req);
            this.$emit('delete')
        },
        onEdit() {
            this.edit = true
        },
        async onClickUpdate() {
            let params = {
                descripcion: this.pensamiento.descripcion
            }
            let req = await axios.put(`/pensamientos/${this.pensamiento.id}`, params)
            this.edit = false
            const pen = req.data
            this.$emit('update', pen)
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
