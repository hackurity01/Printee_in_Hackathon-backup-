#!/usr/bin/env python
#-*- coding: utf-8 -*-

try:
    # For Python 3.0 and later
    from urllib.request import urlopen
except ImportError:
    # Fall back to Python 2's urllib2
    from urllib2 import urlopen

import json
import time
import wget
import win32print
import win32api
import win32con
import time
import getpass
import urllib


def get_jsonparsed_data(url):
    response = urlopen(url)
    data = response.read().decode("utf-8")
    return json.loads(data)
    
    
def authServer():
    printer_id = raw_input("Printer ID : ")
    printer_pw = raw_input("Password : ") #getpass.getpass()
    url = "http://192.168.43.247/ajax/authPrinter.php?id="+printer_id+"&pw="+printer_pw
    response = urlopen(url)
    auth_result = response.read().decode("utf-8")
    print auth_result
    if auth_result=='':
        print "Fail Auth"
        exit()
    else:
        print "Success Auth"
    return auth_result

def sendPrinterInfo(owner):
    printers = win32print.EnumPrinters(win32print.PRINTER_ENUM_LOCAL, None, 2)
    for i, printer in enumerate(printers):
        print str(i+1) +". "+ printer['pPrinterName']
    num = input("Choose Printer : ")
    printer_info = printers[num-1]
    printer_name = raw_input("Input Printer Name : ").decode("utf-8")
    printer_model = printer_info['pDriverName'].replace(' ', '_')
    print printer_model
    url = u"http://192.168.43.247/ajax/setPrinterInfo.php?printer_name="+printer_name+"&printer_model="+printer_model+"&owner="+owner
    response = urlopen(url)
    printer_no = response.read()
    return printer_no

def fileCheckLoop(printer_no):
    while True:
        waiting_page = print_job_checker()
        url = "http://192.168.43.247/ajax/getUploadedFileList.php?printer="+printer_no +"&waiting_page="+str(waiting_page)
        file_list = get_jsonparsed_data(url)
        if len(file_list)>0 and file_list[0]['status']=='waiting':
            downloadFile(file_list)
        print "."
        time.sleep(2)
        
def downloadFile(d):
    for file in d:
        result = wget.download("http://192.168.43.247/"+file['file_path'], '.\\downloadFile\\')
    print result + " is downloaded."
    url = "http://192.168.43.247/ajax/setUploadedFileStatus.php?file="+file['no']
    url = url.encode('utf8')
    response = urlopen(url)
    printing(file['file_path'].split('/')[-1])

def printing(filename, printer_name = None):
    if not printer_name:
        printer_name = win32print.GetDefaultPrinter()
    out = '/d:"%s"' % (printer_name)
    print filename, out
    win32api.ShellExecute(0, "print", ".\\downloadFile\\"+filename, out, ".", 0)

def print_job_checker():
    jobs = []
    for p in win32print.EnumPrinters(win32print.PRINTER_ENUM_LOCAL, None, 1):
        flags, desc, name, comment = p
        total_count = 0
        count = 0
        phandle = win32print.OpenPrinter(name)
        print_jobs = win32print.EnumJobs(phandle, 0, -1, 1)
        if print_jobs:
            jobs.extend(list(print_jobs))
        for job in print_jobs:
            print job
            count = int(job['TotalPages']) + int(job['PagesPrinted'])
            total_count += count
            document = job["pDocument"]
        win32print.ClosePrinter(phandle)
    return total_count
    
    
owner = authServer()
printer_no = sendPrinterInfo(owner)
fileCheckLoop(printer_no)
print_job_checker()
