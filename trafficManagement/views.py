from django.shortcuts import render
from django.http import HttpResponse, Http404, HttpResponseRedirect
from .models import Data

# Create your views here.

def default(request):
    return HttpResponseRedirect('/utms/')

def index(request):
    return render(request, 'trafficManagement/index.html')