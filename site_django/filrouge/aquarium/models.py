from django.db import models
from django.utils import timezone
import datetime

# Create your models here.
class Aquarium(models.Model):
    nom_aquarium = models.CharField(max_length=20)

    def __str__(self):
        return self.nom_aquarium

class donnee_date(models.Model):
    donnee_date = models.DateField()

    def __str__(self):
        return donnee_date

class donnee(models.Model):
    nom_donnee = models.CharField(max_length=15)
    donnee = models.IntegerField()

class note_donnee(models.Model):
    note_donnee = models.CharField(max_length=200)
