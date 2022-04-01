from django.db import models
from django.utils import timezone
import datetime
from django.contrib.auth.models import User
from datetime import date

# Create your models here.
class Aquarium(models.Model):
    nom_aquarium = models.CharField(max_length=20)
    utilisateur = models.ForeignKey(User, on_delete=models.CASCADE)

    def __str__(self):
        return self.nom_aquarium

class Donnee_date(models.Model):
    donnee_date = models.DateField()
    aquarium = models.ForeignKey(Aquarium, on_delete=models.CASCADE)

    def __str__(self):
        return self.donnee_date

class Donnee_releve(models.Model):
    nom_donnee_releve = models.CharField(max_length=15)
    donnee_releve = models.IntegerField()
    donnee_date = models.ForeignKey(Donnee_date, on_delete=models.CASCADE)

    def __str__(self):
        return self.nom_donnee_releve

class Donnee_note(models.Model):
    donnee_note = models.CharField(max_length=200)
    donnee_date = models.ForeignKey(Donnee_date, on_delete=models.CASCADE)

    def __str__(self):
        return self.donnee_note
