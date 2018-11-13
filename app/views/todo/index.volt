{% extends "layouts\base.volt" %}

{% block title %}Index{% endblock %}

{% block content %}
    <div id="todo_input">
        {{ form('todo/store', 'method:post') }}
            <label for='todo'>Add new item</label>
            {{ text_field('todo', 'size':32) }}

            {{ submit_button('Add Item') }}
        {{ end_form() }}
<!--
		<form action="todo/store" method="post">
            <label for='todo'>Add new item</label>
            <input type="text" id="todo">
            <input type="button" value="Add Item">
        </form>
	</div>
-->
	<div id="todo_panel">
		{% if todosCount > 0 %}
			<ul id="todo_list">
			{% for todo in todos %}
				<a href="todo/{{todo.id}}" class="item" >{{ todo.content }}</a>
				<p style="color: white">{{todo.users.name}}</p>
			{% endfor %}
			</ul>
		{% else %}
			<h2 style="color: white; text-align:center;">No Todo Item</h2>
		{% endif %}
	</div>
{% endblock %}