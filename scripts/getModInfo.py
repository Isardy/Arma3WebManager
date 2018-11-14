#!/usr/bin/python3

import sys
import requests
from lxml import html
from datetime import datetime


modid = sys.argv

if len(modid)!=2:
	print("Invalid argument.")
else:
	modid = modid[1]
	url = "https://steamcommunity.com/sharedfiles/filedetails/?id=" + str(modid)
	page = requests.get(url)
	tree = html.fromstring(page.content)
	game = tree.xpath('//div[@class="apphub_AppName ellipsis"]/text()')
	if game[0]!="Arma 3":
		print("Not an Arma 3 mod ID.")
	else:
		latest_update = tree.xpath('//div[@class="detailsStatRight"]/text()')
		title = tree.xpath('//div[@class="workshopItemTitle"]/text()')
		latest_update = latest_update[2]
		title = title[0]
		datetime_update = datetime.strptime(latest_update, '%d %b, %Y @ %I:%M%p')
		print(modid, title, datetime_update)
