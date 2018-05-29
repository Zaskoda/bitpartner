<template>
<div class="doghouse" :class="{ loading: (this.thingsLoading > 0) }">
    <h1>sensor: <b>{{ this.sensor.name }}</b></h1>


    <div class="panel panel-default">
        <div class="panel-heading">
            <ul class="nav nav-pills nav-justified">
                <li v-bind:class="{ active: showRealtime }">
                    <a class="nav-tab" v-on:click="switchRealtime()">Realtime Readings</a>
                </li>
                <li v-bind:class="{ active: showHourly }">
                    <a class="nav-tab" v-on:click="switchHourly()">Hourly Digest</a>
                </li>
                <li v-bind:class="{ active: showDaily }">
                    <a class="nav-tab" v-on:click="switchDaily()">Daily digest</a>
                </li>
            </ul>
        </div>
        <div class="panel-body">

            <div v-if="this.showRealtime">
                <svg width="100%" viewBox="0 0 480 160" style="" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect x="25" width="455" height="180" style="fill:#ffe09d;" />
                    <g v-for="(n, index) in 12" >
                        <line x1="0" :y1="n * 10" x2="480" :y2="n * 10"   stroke="#886622" style="stroke-width:0.3;"/>
                    </g>
                    <g>
                        <text x="2" y="7" font-family="Verdana" font-size="4" > {{ this.graph.toptemp }}c </text>

                        <text x="2" y="115" font-family="Verdana" font-size="4" > {{ this.graph.bottomtemp }}c </text>

                        <line x1="25"   y1="0"   :x2="25"   :y2="120"   stroke="#cc8866" style="stroke-width:1;"/>
                        <line x1="480" y1="0"   :x2="480" :y2="120"   stroke="#cc8866" style="stroke-width:1;"/>
                    </g>
                    <g>
                        <line :x1="reading.bar.x" :y1="reading.bar.top" :x2="reading.bar.x" :y2="reading.bar.bottom" stroke-linecap="round"  :stroke="reading.bar.color" style="stroke-width:4;" v-for="reading in this.sensor.readings" v-bind:key="reading.id"/>
                        <text font-color="#fff" :x="reading.bar.x+2" :y="(reading.bar.top+1)"  :transform="'rotate(-90,'+reading.bar.x+','+reading.bar.top+')'" font-family="Verdana" font-size="4" v-for="reading in this.sensor.readings" v-bind:key="reading.id" >{{ reading.temperature }}c / {{ reading.temperatureF }}f</text>
                        <circle :cx="reading.bar.x" :cy="reading.bar.y"  r="2" :fill="reading.bar.color" style="stroke-width:4;" v-for="reading in this.sensor.readings" v-bind:key="reading.id"/>
                    </g>
                    <polyline :points="this.sensor.points" fill="none" stroke="#cc6600" stroke-width="1px" style="stroke-linejoin: round;"/>
                    <rect x="0" y="120" width="480" height="40" style="fill:rgb(128,92,64);" />
                </svg>
            </div>

            <div v-if="this.showHourly">
                <rico-graph-hourly v-bind:sensor="this.sensor" v-bind:graph="this.graph"></rico-graph-hourly>
            </div>

            <div v-if="this.showDaily">
                <rico-graph :title="this.sensor.name + ' Daily Readings'" v-bind:sensor="this.sensor" v-bind:graph="this.graph"></rico-graph>
            </div>



        </div>
    </div>
    
        <p class="text-center">
            <button v-on:click="pageLeft()" class="btn btn-default">&lt;</button>
            {{ this.page }}
            <button v-on:click="pageRight()" class="btn btn-default">&gt;</button>
        </p>
        
        <div class="form-inline text-center">
            <button v-on:click="sensorLeft()" class="btn btn-default">&lt;</button>
            <input class="form-control" type="text" :value="this.sensorid">
            <button v-on:click="sensorRight()" class="btn btn-default">&gt;</button>
            <input class="form-control" type="date" :value="this.from">
            <input class="form-control" type="date" :value="this.to">
            
        </div>
        <p class="text-center">
            [{{ this.thingsLoading }} thigns loading]
        </p>
</div>
</template>



<!-- SASS styling -->
<style lang="scss">
.doghouse {
    margin: 0.5em 1em;
    padding: 0.5em;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    background: #ffe;
    border: 2px solid #ffe;
}
.loading {
    border: 2px solid #f88;
    background: #edd;
}
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


//Fetch realtime readings.
function getRealtimeReadings(id,from=null,to=null) {
    const url = '/api/sensors/' + id + '/readings?from=' + from + '&to=' +to;
    return axios.get(url)
        .then(x => x.data)
        .catch (err => {
            alert('error: '+JSON.stringify(err.message));
            return false;
        });
}

//Fetch hourly readings.
function getHourlyReadings(id,from=null,to=null) {
    const url = '/api/sensors/' + id + '/hourly?from=' + from + '&to=' +to;
    return axios.get(url)
        .then(x => x.data)
        .catch (err => {
            alert('error: '+JSON.stringify(err.message));
            return false;
        });
}

//Fetch dail readings.
function getDailyReadings(id,from=null,to=null) {
    const url = '/api/sensors/' + id + '/hourly?from=' + from + '&to=' +to;
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
        this.sensorid = this.sensorId;
        this.fetchSensor();
    },
    watch: {
    },
    computed: {
    },
    props: [
      'sensorId',
    ],
    data() {
        return {
            sensor: {},
            thingsLoading: 0,
            readings: {
                realtime: null,
                daily: null,
                hourly: null
            },
            drawdata: {},
            page: 1,
            sensorid: 0,
            showRealtime: false,
            showHourly: true,
            showDaily: false,
            from: '',
            to: '',
            graph: {
                height: 160,
                width: 480,
                toptemp: 65,
                bottomtemp: 0,
            }
        }
    },
    methods: {
        fetchSensor() {
            //the slug is a number
            if (!isNaN(this.sensorid)) {
                this.thingsLoading++;
                getSensor(this.sensorid,this.page)              
                    .then(x => {
                        this.thingsLoading--;
                        this.loadSensor(x);
                    })
                    .catch(err => {
                        this.thingsLoading--;
                        alert('error loading sensor: '+JSON.stringify(err.message));
                    });
            } 
        },
        switchRealtime() {;
            this.showRealtime = true;
            this.showHourly = false;
            this.showDaily = false;
        },
        switchHourly() {
            this.showRealtime = false;
            this.showHourly = true;
            this.showDaily = false;

        },
        switchDaily() {
            this.showRealtime = false;
            this.showHourly = false;
            this.showDaily = true;
        },
        keepRefreshing() {
            var self = this;
            self.fetchSensor();
            setTimeout(function(){ self.keepRefreshing() }, 50000);
        },
        loadSensor(sensor) {
            if (isNaN(sensor.id)) return;
            history.pushState({ id: sensor.id }, "Sensor", "/dash/sensors/"+sensor.id);
            
            this.thingsLoading++;
            getRealtimeReadings(this.sensorid,this.from,this.to).then(x => {
                    this.readings.realtime = x;
                    this.thingsLoading--;
                })
                .catch(err => {
                    this.thingsLoading--;
                });
            
            this.thingsLoading++;
            getHourlyReadings(this.sensorid,this.from,this.to).then(x => {
                    this.readings.hourly = x;
                    this.thingsLoading--;
                })
                .catch(err => {
                    this.thingsLoading--;
                });
            
            this.thingsLoading++;
            getDailyReadings(this.sensorid,this.from,this.to).then(x => {
                    this.readings.daily = x;
                    this.thingsLoading--;
                })
                .catch(err => {
                    this.thingsLoading--;
                });

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
                reading.temperatureF = Math.round(reading.temperature * 1.8 + 32.2);
                reading.temperature = Math.round(reading.temperature,2);
                reading.bar.color= rgbToHex(reading.red,reading.green,reading.blue);
                sensor.points += x+','+y+' ';
            }
            return sensor;
        },
        pageRight() {
            this.page++;
            this.fetchSensor();
        },
        pageLeft() {
            if (this.page > 1) {
                this.page--;
            }
            this.fetchSensor();
        },
        sensorLeft() {
            if (this.sensorid > 1) {
                this.sensorid--;
            }
            this.fetchSensor();
        },
        sensorRight() {
            this.sensorid++;
            this.fetchSensor();
        }


    }
}


</script>