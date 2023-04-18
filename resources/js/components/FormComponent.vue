<template>
    <div class="card">
        <div class="card-header">
            <h2>En que estas pensando</h2>
        </div>
        <div class="card-body">

            <form v-on:submit.prevent="nuevoPensamiento()">
                <div class="form-group">
                    <label for="">Ahora estoy pensando en </label>
                    <input class="form-control" type="text" name="pensamiento" v-model="descripcion">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            descripcion: ''
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        async nuevoPensamiento() {
            const params = {
                descripcion: this.descripcion
            }
            let req = await axios.post('/pensamientos', params)
            const pensam = req.data
            this.$emit('new', pensam)
            this.descripcion = ''

            /*  let pensamiento = {
                 id: '2',
                 descripcion: this.descripcion,
                 fecha: '18/04/2023'
             } */

        }
    }
}
</script>
