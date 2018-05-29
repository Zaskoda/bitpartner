<template>
    <div>
        {{ title }}
        
        <svg width="100%" :viewBox="viewbox" style="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <rect x="0" y="0" width="480" height="160" style="fill:#000000;" />
            <rect x="25" width="455" height="160" style="fill:#ffe09d;" />
            <slot>
                <text x="30" y="30" font-family="Verdana" font-size="40" > no data </text>
            </slot>    
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