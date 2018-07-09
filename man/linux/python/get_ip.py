#!/usr/bin/python
# -*- coding: UTF-8 -*-

import sys
import socket
args = sys.argv

def main():
    try:
        if args[1] == 'ip':
            get_ip()
        if args[1] == 'hostname':
            get_hostname()
    except:
        pass

def get_ip():
    ip = socket.gethostbyname(socket.gethostname())
    print(ip)

def get_hostname():
    hostname = socket.gethostname()
    print(hostname)

if __name__ == '__main__':
    main()
