#!/usr/bin/python
# -*- coding: UTF-8 -*-

import sys
args = sys.argv

def main():
    try:
        if args[1] == 'ip':
            get_ip()
    except:
        pass

def get_ip():
    import socket
    ip = socket.gethostbyname(socket.gethostname())
    print(ip)

if __name__ == '__main__':
    main()