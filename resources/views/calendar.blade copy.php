<div id="event-calendar" class="card">
<span>@{{ new Date().toLocaleString() }}</span>
<ul>
  <li v-for="item in items" :key="item.name">
    @{{ item.name }}
  </li>
</ul>
</div>