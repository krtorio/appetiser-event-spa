<template>
    <form @submit="formSubmit">
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="name">Event</label>
                <input type="text" class="form-control" id="event" name="event" value="" v-model="event">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="from">From</label>
                <input type="date" class="form-control" id="from" name="from" value="" v-model="from">
            </div>
            <div class="col-sm-6">
                <label for="to">To</label>
                <input type="date" class="form-control" id="to" name="to" value="" v-model="to">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Mon" value="Mon" v-model="days">
                    <label class="custom-control-label" for="Mon">Mon</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Tue" value="Tue" v-model="days">
                    <label class="custom-control-label" for="Tue">Tue</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Wed" value="Wed" v-model="days">
                    <label class="custom-control-label" for="Wed">Wed</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Thu" value="Thu" v-model="days">
                    <label class="custom-control-label" for="Thu">Thu</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Fri" value="Fri" v-model="days">
                    <label class="custom-control-label" for="Fri">Fri</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Sat" value="Sat" v-model="days">
                    <label class="custom-control-label" for="Sat">Sat</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Sun" value="Sun" v-model="days">
                    <label class="custom-control-label" for="Sun">Sun</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
            </div>
        </div>
    </form>
</template>

<script>
import { EventBus } from '../app.js';

export default {
    data() {
        return { 
            //daysOfWeek: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            days: [],
            from: '',
            to: '',
            event: '',
        }
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            let currentObj = this;
            axios.post('/api/events/add',{
                event: this.event,
                from: this.from,
                to: this.to,
                days: this.days
            }).then((response) => {
                EventBus.$emit('add-event-successful', 'from form component');
                //this.$refs.getEvents(this.year+'-'+this.numMonth);
            });
        },
    }
}
</script>