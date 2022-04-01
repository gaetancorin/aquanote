from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader
from .models import Aquarium

# Create your views here.
def index(request):
    liste_aquarium = Aquarium.objects.all()
    context = {'liste_aquarium': liste_aquarium}
    return render(request, 'aquarium/index.html', context)
