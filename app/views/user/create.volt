{% extends "layouts\base.volt" %}

{% block title %}Daftar Disini{% endblock %}

{% block content %}
    <form action="{{url("register")}}" method="post">
        <label for="username">Username</label>
        <input type="username" name="username" id="username">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Register">
    </form>
{% endblock %}