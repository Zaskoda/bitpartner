<template>
    <div>
        {{ this.sensor.name }}
        <svg width="100%" :viewBox="viewbox" style="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <rect x="0" y="0" width="480" height="160" style="fill:#000000;" />
            <rect x="25" width="455" height="160" style="fill:#ffe09d;" />
            
        </svg>
    </div>
</template>



<!-- SASS styling -->
<style lang="scss">
</style>

<script>



export default {
    name: 'rico-graph',
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