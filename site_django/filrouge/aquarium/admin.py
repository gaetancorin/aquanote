from django.contrib import admin
from .models import Aquarium, Donnee_date, Donnee_releve, Donnee_note

# Register your models here.
admin.site.register(Aquarium)
admin.site.register(Donnee_date)
admin.site.register(Donnee_releve)
admin.site.register(Donnee_note)
