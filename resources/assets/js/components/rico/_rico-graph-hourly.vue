<template>
    <div>
        <rico-graph :title="this.sensor.name + ' Daily Readings'" v-bind:sensor="this.sensor" v-bind:graph="this.graph">
            <text x="30" y="30" font-family="Verdana" font-size="40" > Data! </text>
        </rico-graph>
    </div>
</template>



<!-- SASS styling -->
<style lang="scss">
</style>

<script>



export default {
    name: 'rico-graph-hourly',
    mounted() {
    },
    watch: {
    },
    computed: {
        viewbox(){
            return "0 0 " + this.graph.width + " " + this.graph.height;
        }
    },
    props: [
        'sensor',
        'title',
        'graph'
    ],
    data() {
        return {
        }
    },
    methods: {

    }
}


</script>