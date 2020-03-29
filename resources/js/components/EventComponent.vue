<template>
<div class="container">
    <div class="row">
        <form @submit="changeMonth">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="name">Year</label>
                    <input type="text" class="form-control" id="year" name="year" v-model="yearSelected">
                </div>
                <div class="col-sm-4">
                    <label for="name">Month</label>
                    <select class="form-control" id="month" name="numMonth" v-model="monthSelected">
                        <option v-for="month in monthSelect" :value="month.num" :selected="month.num == numMonth" :key="month.num">{{ month.name }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary" id="btnChange">ChangeMonth</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ monthYear }}</div>
                
                <div class="card-body">
                    
                    <table class="table">
                        <tr v-for="item in items" :key="item.month" 
                            v-bind:class="{'table-success': item.events}"
                        >
                            <td>{{ item.month }}</td>
                            <td>{{ item.events }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import { EventBus } from '../app.js';  

    export default {
        
        data() {
            return {
                items: {},
                monthYear: '',
                numMonth: '',
                year: '',
                yearSelected: '',
                monthSelected: '',
                monthSelect: [
                    {'name':'January','num':'01'},
                    {'name':'February','num':'02'},
                    {'name':'March','num':'03'},
                    {'name':'April','num':'04'},
                    {'name':'May','num':'05'},
                    {'name':'June','num':'06'},
                    {'name':'July','num':'07'},
                    {'name':'August','num':'08'},
                    {'name':'September','num':'09'},
                    {'name':'October','num':'10'},
                    {'name':'November','num':'11'},
                    {'name':'December','num':'12'}
                ]
            }
        },
        methods: {
            changeMonth(e) {
                e.preventDefault();
                let currentObj = this;
                this.getEvents(this.yearSelected+'-'+this.monthSelected);
            },
            getEvents(selectedMonth=''){
                var getUrl = '/api/events/get';
                if (selectedMonth !== '') getUrl = getUrl + '/' + selectedMonth;
                axios.get(getUrl)
                     .then((response)=>{
                       this.monthYear = response.data.month;
                       this.items = response.data.events;
                       this.numMonth = response.data.numerical_month;
                       this.year = response.data.year;
                     })
            }
        },
        created() {
            EventBus.$on('add-event-successful', data => {
                this.getEvents(this.year+'-'+this.numMonth);
            });
            this.getEvents();
        }
    }
</script> 