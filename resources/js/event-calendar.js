import Vue from 'vue'
import axios from 'axios'

const API_BASE_URL = 'http://localhost:8000/api';

var eventcalendar = new Vue({
    el: '#event-calendar',
    data: {
      items: [
        { name: 'March 28' },
        { name: 'March 29' }
      ]
    }
  })