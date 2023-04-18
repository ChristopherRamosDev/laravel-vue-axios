<template>
    <div class="row">

        <div class="col-md-12">
            <form-component @new="add">
            </form-component>
        </div>
        <div class="col-md-12">
            <example-component v-for="(pensamiento, index) in pensamientos" :key="pensamiento.id" :pensamiento="pensamiento"
                @delete="deletePensamiento(index)" @update="updatePensiento(index, ...arguments)">
            </example-component>
        </div>



    </div>
</template>

<script>
export default {
    data() {
        return {
            pensamientos: []
        }
    },
    methods: {
        add(pensamiento) {
            this.pensamientos.push(pensamiento)
        },
        deletePensamiento(i) {
            console.log(i);
            this.pensamientos.splice(i, 1)
        },
        updatePensiento(i, pensamiento) {
            this.pensamientos[i] = pensamiento
        }
    },
    async mounted() {
        let req = await axios.get('/pensamientos')
        this.pensamientos = req.data
        console.log(req);
    }
}
</script>
