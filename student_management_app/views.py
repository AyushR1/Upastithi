from django.http import HttpResponseRedirect
from django.shortcuts import render

# Create your views here.
def showDemoPage(request):
    return render(request,"demo.html")

def redirectStudent(request):
    return HttpResponseRedirect("/login_student")