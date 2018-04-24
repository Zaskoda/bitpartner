<template>
<div class="doghouse" >

        <svg width="100%" viewBox="0 0 480 120" style="" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <rect x="25" width="455" height="180" style="fill:#ffe09d;" />
            <g>

                <line x1="0" y1="0"   :x2="480" :y2="0"   stroke="#cc8866" style="stroke-width:1;"/>
                <text x="2" y="5" font-family="Verdana" font-size="4" > 60c / 140f </text>
                <line x1="0" y1="10"  :x2="480" :y2="10"  stroke="#ff3300" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="15" font-family="Verdana" font-size="4" > 55c / 131f </text>
                <line x1="0" y1="20"  :x2="480" :y2="20"  stroke="#ee4400" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="25" font-family="Verdana" font-size="4" > 50c / 122f </text>
                <line x1="0" y1="30"  :x2="480" :y2="30"  stroke="#dd4411" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="35" font-family="Verdana" font-size="4" > 45c / 113f </text>
                <line x1="0" y1="40"  :x2="480" :y2="40"  stroke="#cc5522" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="45" font-family="Verdana" font-size="4" > 40c / 104f </text>
                <line x1="0" y1="50"  :x2="480" :y2="50"  stroke="#bb5533" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="55" font-family="Verdana" font-size="4" > 35c / 95f </text>
                <line x1="0" y1="60"  :x2="480" :y2="60"  stroke="#aa6644" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="65" font-family="Verdana" font-size="4" > 30c / 86f </text>
                <line x1="0" y1="70"  :x2="480" :y2="70"  stroke="#996655" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="75" font-family="Verdana" font-size="4" > 25c / 77f </text>
                <line x1="0" y1="80"  :x2="480" :y2="80"  stroke="#887766" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="85" font-family="Verdana" font-size="4" > 20c / 68f </text>
                <line x1="0" y1="90"  :x2="480" :y2="90"  stroke="#777777" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="95" font-family="Verdana" font-size="4" > 15c / 59f </text>
                <line x1="0" y1="100" :x2="480" :y2="100" stroke="#667788" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="105" font-family="Verdana" font-size="4" > 10c / 50f </text>
                <line x1="0" y1="110" :x2="480" :y2="110" stroke="#556699" style="stroke-width:0.25;" stroke-dasharray="3,1"/>
                <text x="2" y="115" font-family="Verdana" font-size="4" > 5c / 41f </text>
                <line x1="25" y1="120" :x2="480" :y2="120" stroke="#4466aa" style="stroke-width:0.25;" stroke-dasharray="3,1"/>

                <line x1="25"   y1="0"   :x2="25"   :y2="120"   stroke="#cc8866" style="stroke-width:1;"/>
                <line x1="480" y1="0"   :x2="480" :y2="120"   stroke="#cc8866" style="stroke-width:1;"/>
            </g>
            <g>
                <line :x1="reading.bar.x" :y1="reading.bar.top" :x2="reading.bar.x" :y2="reading.bar.bottom" stroke-linecap="round"  :stroke="reading.bar.color" style="stroke-width:4;" v-for="reading in this.sensor.readings" v-bind:key="reading.id"/>
                <text font-color="#fff" :x="reading.bar.x+2" :y="(reading.bar.top+1)"  :transform="'rotate(-90,'+reading.bar.x+','+reading.bar.top+')'" font-family="Verdana" font-size="4" v-for="reading in this.sensor.readings" v-bind:key="reading.id" >{{ reading.temperature }}c / {{ reading.temperatureF }}f</text>
                <circle :cx="reading.bar.x" :cy="reading.bar.y"  r="2" :fill="reading.bar.color" style="stroke-width:4;" v-for="reading in this.sensor.readings" v-bind:key="reading.id"/>
            </g>
            <polyline :points="this.sensor.points" fill="none" stroke="#cc6600" stroke-width="1px" style="stroke-linejoin: round;"/>
        </svg>
        <button v-on:click="pageLeft()" class="btn btn-default">&lt;</button>
        {{ this.page }}
        <button v-on:click="pageRight()" class="btn btn-default">&gt;</button>
</div>
</template>



<!-- SASS styling -->
<style lang="scss">
</style>

<script>

//Sensor fetch
function getSensor(id,page=1) {
    const url = '/api/sensors/' + id +'?page='+page;
    return axios.get(url)
        .then(x => x.data)
        .catch (err => {
            alert('error: '+JSON.stringify(err.message));
            return false;
        });
}

function rgbToHex(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}



export default {
    name: 'rico',
    mounted() {

        var urlstring = window.location.pathname;
        var urlparts = urlstring.split('/');
        this.sensorid = urlparts[2];
        this.fetchSensor();
    },
    watch: {
    },
    computed: {
    },
    props: [
    ],
    data() {
        return {
            sensor: {},
            drawdata: {},
            page: 1,
            sensorid: 0
        }
    },
    methods: {
        fetchSensor() {
            //the slug is a number
            if (!isNaN(this.sensorid)) {
                getSensor(this.sensorid,this.page)              
                    .then(x => {
                        this.loadSensor(x);
                    })
                    .catch(err => {
                        alert('error loading product: '+JSON.stringify(err.message));
                    });
            } 
        },
        loadSensor(sensor) {
            if (isNaN(sensor.id)) return;
            history.pushState({ id: sensor.id }, "Sensor", "/sensors/"+sensor.id);
            this.sensor = this.renderGraphData(sensor);
        },
        renderGraphData(sensor) {
            sensor.points = '';
            for (const [i, reading] of sensor.readings.entries()) {
                var x = (i/sensor.readings.length)*450 + 30;
                var y = (60-reading.temperature)*2;
                reading.bar = {points:[]};
                reading.bar.top = y-2;
                reading.bar.bottom = y+2;
                reading.bar.y = y;
                reading.bar.x = x;
                reading.temperatureF = Math.round(reading.temperature * 1.8 + 32,2);
                reading.temperature = Math.round(reading.temperature,2);
                reading.bar.color= rgbToHex(reading.red,reading.green,reading.blue);
                sensor.points += x+','+y+' ';
            }
            return sensor;
        },
        pageLeft() {
            this.page++;
            this.fetchSensor();
        },
        pageRight() {
            if (this.page > 1) {
                this.page--;
            }
            this.fetchSensor();
        }


    }
}


</script>