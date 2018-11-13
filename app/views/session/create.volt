{% extends "layouts\base.volt" %}

{% block title %}Index{% endblock %}

{% block content %}
    <form action="{{url("login")}}" method="post">
        <label for="username">Username</label>
        <input type="username" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Login">
    </form>

    <a href="{{url("register")}}">Register</a>
{% endblock %}