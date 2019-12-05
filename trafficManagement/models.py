from django.db import models
from django.core.signals import request_finished
from django.dispatch import receiver
from django.db.models.signals import post_save

# Create your models here.

class Data(models.Model):
    user_name = models.CharField(max_length=20, primary_key = True)
    name = models.CharField(max_length=20)
    mobile_number = models.CharField(max_length=10)
    residence = models.CharField(max_length=200)
    aadhar = models.CharField(max_length=12)
    password = models.CharField(max_length=12)
    def __str__(self):
        return self.user_name


