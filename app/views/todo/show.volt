{% extends "layouts\base.volt" %}

{% block title %}{{title}}{% endblock %}

{% block content%}
    <h2 style="color:white">My todo #{{todoID}}</h2>
    <p>{{todoContent}}</p>
{% endblock %}