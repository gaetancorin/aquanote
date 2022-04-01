from django.urls import path

from . import views

app_name = 'aquarium'
urlpatterns = [
    path('', views.index, name='index'),
]
