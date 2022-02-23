# jan/21/2021 14:54:58 by RouterOS 6.46.8
# software id = JSAK-0VXU
#
# model = 951Ui-2HnD
# serial number = B8710CDA0A70
/tool user-manager customer
set admin access=\
    own-routers,own-users,own-profiles,own-limits,config-payment-gw password=\
    Wasiu123
/tool user-manager profile
add name=Admin name-for-users=Admin override-shared-users=5 owner=admin \
    price=0 starts-at=logon validity=0s
add name="Super Admin" name-for-users="" override-shared-users=unlimited \
    owner=admin price=0 starts-at=logon validity=0s
add name=Staff name-for-users="" override-shared-users=3 owner=admin price=0 \
    starts-at=logon validity=0s
add name="1 day" name-for-users="" override-shared-users=2 owner=admin price=\
    0 starts-at=logon validity=8h
add name="2 days" name-for-users="" override-shared-users=2 owner=admin \
    price=0 starts-at=logon validity=1d8h
add name="3 days" name-for-users="" override-shared-users=2 owner=admin \
    price=0 starts-at=logon validity=2d8h
add name="4 days" name-for-users="" override-shared-users=2 owner=admin \
    price=0 starts-at=logon validity=3d8h
add name="5 days" name-for-users="" override-shared-users=2 owner=admin \
    price=0 starts-at=logon validity=4d8h
add name="1 week" name-for-users="" override-shared-users=2 owner=admin \
    price=0 starts-at=logon validity=6d8h
add name="2 weeks" name-for-users="" override-shared-users=off owner=admin \
    price=0 starts-at=logon validity=0s
add name="3 weeks" name-for-users="" override-shared-users=2 owner=admin \
    price=0 starts-at=logon validity=2w6d8h
add name="1 month" name-for-users="" override-shared-users=2 owner=admin \
    price=0 starts-at=logon validity=4w1d8h
add name=test name-for-users="" override-shared-users=unlimited owner=admin \
    price=0 starts-at=logon validity=15m
/tool user-manager profile limitation
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name=Admin owner=admin rate-limit-min-rx=5242880B rate-limit-min-tx=\
    5242880B rate-limit-rx=5242880B rate-limit-tx=5242880B transfer-limit=0B \
    upload-limit=0B uptime-limit=0s
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name=Staff owner=admin rate-limit-min-rx=4194304B rate-limit-min-tx=\
    4194304B rate-limit-rx=4194304B rate-limit-tx=4194304B transfer-limit=0B \
    upload-limit=0B uptime-limit=0s
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="1 day" owner=admin rate-limit-min-rx=4194304B rate-limit-min-tx=\
    4194304B rate-limit-priority=1 rate-limit-rx=4194304B rate-limit-tx=\
    4194304B transfer-limit=0B upload-limit=0B uptime-limit=8h
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="2 days" owner=admin rate-limit-min-tx=1048576B rate-limit-rx=\
    4194304B rate-limit-tx=4194304B transfer-limit=0B upload-limit=0B \
    uptime-limit=16h
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="3 days" owner=admin rate-limit-min-tx=1048576B rate-limit-rx=\
    4194304B rate-limit-tx=4194304B transfer-limit=0B upload-limit=0B \
    uptime-limit=1d
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="4 days" owner=admin rate-limit-min-tx=1048576B rate-limit-rx=\
    4194304B rate-limit-tx=4194304B transfer-limit=0B upload-limit=0B \
    uptime-limit=1d8h
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="5 days" owner=admin rate-limit-min-tx=2097152B rate-limit-priority=\
    1 rate-limit-rx=5242880B rate-limit-tx=5242880B transfer-limit=0B \
    upload-limit=0B uptime-limit=1d16h
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="1 Week" owner=admin rate-limit-min-tx=1048576B rate-limit-rx=\
    5242880B rate-limit-tx=5242880B transfer-limit=0B upload-limit=0B \
    uptime-limit=2d
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="2 weeks" owner=admin rate-limit-min-rx=1048576B rate-limit-min-tx=\
    1048576B rate-limit-rx=4194304B rate-limit-tx=4194304B transfer-limit=0B \
    upload-limit=0B uptime-limit=4d
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="3 weeks" owner=admin rate-limit-min-rx=1048576B rate-limit-min-tx=\
    1048576B rate-limit-rx=4194304B rate-limit-tx=4194304B transfer-limit=0B \
    upload-limit=0B uptime-limit=6d
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name="1 month" owner=admin rate-limit-min-rx=1048576B rate-limit-min-tx=\
    1048576B rate-limit-rx=5242880B rate-limit-tx=5242880B transfer-limit=0B \
    upload-limit=0B uptime-limit=1w1d16h
add address-list="" download-limit=0B group-name="" ip-pool="" ip-pool6="" \
    name=test owner=admin transfer-limit=0B upload-limit=0B uptime-limit=\
    1m20s
/tool user-manager database
set db-path=user-manager
/tool user-manager profile profile-limitation
add from-time=0s limitation="1 day" till-time=7h59m59s weekdays=\
    sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=8h limitation="1 day" till-time=17h59m59s weekdays=\
    monday,tuesday,wednesday,thursday,friday,saturday
add from-time=8h limitation="1 Week" till-time=18h59m59s weekdays=\
    monday,tuesday,wednesday,thursday,friday,saturday
add from-time=8h limitation="1 month" till-time=18h59m59s weekdays=\
    monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation=test till-time=23h59m59s weekdays=\
    sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="2 weeks" profile="2 weeks" till-time=16h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="3 weeks" profile="3 weeks" till-time=16h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="1 Week" profile="1 week" till-time=16h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="5 days" profile="5 days" till-time=17h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="4 days" profile="4 days" till-time=17h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="3 days" profile="3 days" till-time=16h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="2 days" profile="2 days" till-time=17h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation="1 day" profile="1 day" till-time=17h30m \
    weekdays=sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation=test profile="1 month" till-time=16h30m weekdays=\
    sunday,monday,tuesday,wednesday,thursday,friday,saturday
add from-time=0s limitation=test profile=test till-time=23h59m59s weekdays=\
    sunday,monday,tuesday,wednesday,thursday,friday,saturday
/tool user-manager router
add coa-port=1700 customer=admin disabled=no ip-address=41.242.74.68 log=\
    auth-fail name=ATChub shared-secret=01234567890 use-coa=no
add coa-port=1700 customer=admin disabled=no ip-address=127.0.0.1 log=\
    auth-ok,auth-fail,acct-ok,acct-fail name=ATC shared-secret=Wasiu123 \
    use-coa=no
/tool user-manager user
add customer=admin disabled=no ipv6-dns=:: password="OK " shared-users=\
    unlimited username=Ayo wireless-enc-algo=none wireless-enc-key="" \
    wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=BbM shared-users=3 \
    username=bbm wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=aid shared-users=2 \
    username=3d2hf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=en3 shared-users=2 \
    username=3dapk wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=tey shared-users=2 \
    username=3dw76 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jkz shared-users=2 \
    username=3dw82 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ixc shared-users=2 \
    username=3duyv wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=akj shared-users=2 \
    username=3dzzi wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jy7 shared-users=2 \
    username=3dziy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=p3b shared-users=2 \
    username=3d35r wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=n7t shared-users=2 \
    username=3dq8t wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=sau shared-users=2 \
    username=3deg9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rax shared-users=2 \
    username=3d3qd wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=fv8 shared-users=2 \
    username=3dzq9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=4nz shared-users=2 \
    username=3dyen wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hi6 shared-users=2 \
    username=3desh wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=aer shared-users=2 \
    username=3dt7v wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=4bx shared-users=2 \
    username=3dx49 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=e9m shared-users=2 \
    username=3djjf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8ec shared-users=2 \
    username=3dh6k wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7c8 shared-users=2 \
    username=3d9kf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5wn shared-users=2 \
    username=3d7wk wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=af8 shared-users=2 \
    username=3dkmg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=byd shared-users=2 \
    username=3dv2v wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=vki shared-users=2 \
    username=3dd4w wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=h9i shared-users=2 \
    username=3dwp7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=i5m shared-users=2 \
    username=3dtmw wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=zgh shared-users=2 \
    username=3dndc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=v29 shared-users=2 \
    username=3ddej wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=tz4 shared-users=2 \
    username=3dfvj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cmu shared-users=2 \
    username=3dfs7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=bg8 shared-users=2 \
    username=3d7rn wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ske shared-users=2 \
    username=3dfwd wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6r2 shared-users=2 \
    username=3d2tc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ayq shared-users=2 \
    username=3d66z wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ydy shared-users=2 \
    username=3dwjy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=k6z shared-users=2 \
    username=3d6y5 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=f9r shared-users=2 \
    username=3daxt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=pfb shared-users=2 \
    username=3djbg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=erj shared-users=2 \
    username=3dfv9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=nbe shared-users=2 \
    username=3dbw2 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=kia shared-users=2 \
    username=3d7be wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=4f2 shared-users=2 \
    username=3dzi8 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rsy shared-users=2 \
    username=3dkdr wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=3kg shared-users=2 \
    username=3dr9b wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=dws shared-users=2 \
    username=3ddjg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ebh shared-users=2 \
    username=3diin wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=mxn shared-users=2 \
    username=3dn2x wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=68g shared-users=2 \
    username=3dgv8 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=neb shared-users=2 \
    username=3dhvd wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hb3 shared-users=2 \
    username=3df2y wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ckp shared-users=2 \
    username=3duj9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=p5r shared-users=2 \
    username=4d6zp wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=qxc shared-users=2 \
    username=4dvc5 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=txs shared-users=2 \
    username=4ds2x wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=x72 shared-users=2 \
    username=4dm69 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8tf shared-users=2 \
    username=4d2j8 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=2zs shared-users=2 \
    username=4d3is wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=dvi shared-users=2 \
    username=4deig wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=bx5 shared-users=2 \
    username=4dr8z wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=q83 shared-users=2 \
    username=4di73 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=46c shared-users=2 \
    username=4dutm wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ha8 shared-users=2 \
    username=4dfh6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hxx shared-users=2 \
    username=4dwgk wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5yg shared-users=2 \
    username=4d6tp wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=227 shared-users=2 \
    username=4dvy6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=3ag shared-users=2 \
    username=4dwaj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=u7r shared-users=2 \
    username=4dni5 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=je7 shared-users=2 \
    username=4d56z wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=bzy shared-users=2 \
    username=4dirg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=mgy shared-users=2 \
    username=4d56m wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rb7 shared-users=2 \
    username=4dcaf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=762 shared-users=2 \
    username=4dwv6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=85x shared-users=2 \
    username=4dfac wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=s3q shared-users=2 \
    username=4dssg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ksy shared-users=2 \
    username=4dz9s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=g3y shared-users=2 \
    username=4dk9t wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=tnu shared-users=2 \
    username=4dyyy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6zb shared-users=2 \
    username=4d9re wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=xcu shared-users=2 \
    username=4d3zy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=sjr shared-users=2 \
    username=4d6ev wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=eu5 shared-users=2 \
    username=4d6er wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=bre shared-users=2 \
    username=4diss wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=htr shared-users=2 \
    username=4dae9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cj4 shared-users=2 \
    username=4dau7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=qy5 shared-users=2 \
    username=4dbs5 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=9c2 shared-users=2 \
    username=4drun wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7ty shared-users=2 \
    username=4dcr6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=d6a shared-users=2 \
    username=4dha4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=chn shared-users=2 \
    username=4d5y4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6g4 shared-users=2 \
    username=4dk4u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=aqk shared-users=2 \
    username=4de56 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rn7 shared-users=2 \
    username=4deyt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=qtc shared-users=2 \
    username=4dhtj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cgw shared-users=2 \
    username=4dvpx wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8qf shared-users=2 \
    username=4d6ip wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=y38 shared-users=2 \
    username=4dqix wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wk6 shared-users=2 \
    username=4dvff wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7nj shared-users=2 \
    username=4dvdy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=b8g shared-users=2 \
    username=4d865 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7bg shared-users=2 \
    username=4dwd7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wyk shared-users=2 \
    username=4dxs4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ye2 shared-users=2 \
    username=4drke wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=dpg shared-users=2 \
    username=4da9v wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=k6z shared-users=2 \
    username=4dg5g wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ed4 shared-users=2 \
    username=4du3h wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=puq shared-users=2 \
    username=4d62b wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6hx shared-users=2 \
    username=4db95 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=9gv shared-users=2 \
    username=4ds9s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hdh shared-users=2 \
    username=4d8am wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=weu shared-users=2 \
    username=4d3rg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=esk shared-users=2 \
    username=4d6yc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7rv shared-users=2 \
    username=5d5rk wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=i83 shared-users=2 \
    username=5dmen wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=y3b shared-users=2 \
    username=5d9nj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=g9w shared-users=2 \
    username=5d85u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=nsr shared-users=2 \
    username=5dbc4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=k3p shared-users=2 \
    username=5dwqc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=s5r shared-users=2 \
    username=5duam wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=55f shared-users=2 \
    username=5dgxj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hgd shared-users=2 \
    username=5dpiy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5m4 shared-users=2 \
    username=5da2s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=e2t shared-users=2 \
    username=5dh6u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ark shared-users=2 \
    username=5d6qp wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=tsw shared-users=2 \
    username=5dtny wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=33j shared-users=2 \
    username=5d8tj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=krj shared-users=2 \
    username=5dsft wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=gf4 shared-users=2 \
    username=5dw3w wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=nwj shared-users=2 \
    username=5drci wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jwi shared-users=2 \
    username=5dj7q wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=xd2 shared-users=2 \
    username=5d8jz wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=pvx shared-users=2 \
    username=5d87s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=z8f shared-users=2 \
    username=5df9x wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=554 shared-users=2 \
    username=5dst7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hju shared-users=2 \
    username=5daj6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=43j shared-users=2 \
    username=5dgcc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ngx shared-users=2 \
    username=5dd3u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=u5k shared-users=2 \
    username=5dtvt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cxz shared-users=2 \
    username=5dq8u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=j6b shared-users=2 \
    username=5de87 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wjt shared-users=2 \
    username=5d74h wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=kfz shared-users=2 \
    username=5dzij wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=y52 shared-users=2 \
    username=5dq34 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=e3c shared-users=2 \
    username=5dy9f wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=zv6 shared-users=2 \
    username=5du6s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=sgu shared-users=2 \
    username=5dbhb wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=pzr shared-users=2 \
    username=5d576 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=vem shared-users=2 \
    username=5d2wf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=xav shared-users=2 \
    username=5dqdn wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5x4 shared-users=2 \
    username=5diim wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=qip shared-users=2 \
    username=5d6vn wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rxk shared-users=2 \
    username=5d3xt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ezk shared-users=2 \
    username=5d2tx wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=xy7 shared-users=2 \
    username=5d6p2 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=84c shared-users=2 \
    username=5dkw2 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6mj shared-users=2 \
    username=5dmzy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ibq shared-users=2 \
    username=5djfj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5bt shared-users=2 \
    username=5d3ti wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rmn shared-users=2 \
    username=5dddv wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=j6y shared-users=2 \
    username=5denq wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=22m shared-users=2 \
    username=5ddza wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ydk shared-users=2 \
    username=5drid wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=zm2 shared-users=2 \
    username=5dhkx wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hmc shared-users=2 \
    username=5dk5m wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=9mf shared-users=2 \
    username=5ddh6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=t4f shared-users=2 \
    username=5d49r wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=du9 shared-users=2 \
    username=5dcvf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=q4x shared-users=2 \
    username=5dc6f wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=sgt shared-users=2 \
    username=5daez wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6ud shared-users=2 \
    username=5d8sf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=v87 shared-users=2 \
    username=5dcts wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=n4k shared-users=2 \
    username=1wrfv wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wkp shared-users=2 \
    username=1wtnd wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=juv shared-users=2 \
    username=1wpeh wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7uk shared-users=2 \
    username=1wd8s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=zxp shared-users=2 \
    username=1wxpc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=irc shared-users=2 \
    username=1ws4a wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=893 shared-users=2 \
    username=1wj9a wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=un8 shared-users=2 \
    username=1we34 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=baz shared-users=2 \
    username=1wmah wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=49b shared-users=2 \
    username=1wtw6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=pz2 shared-users=2 \
    username=1w49s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=r59 shared-users=2 \
    username=1wd66 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=49m shared-users=2 \
    username=1whdu wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=haw shared-users=2 \
    username=1wiqf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ihh shared-users=2 \
    username=1wjzb wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=w6x shared-users=2 \
    username=1wusv wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=369 shared-users=2 \
    username=1w4gt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rrb shared-users=2 \
    username=1w55t wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wed shared-users=2 \
    username=1w88i wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=2a3 shared-users=2 \
    username=1w7qt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=nej shared-users=2 \
    username=1wake wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=vs7 shared-users=2 \
    username=1wcmb wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7x9 shared-users=2 \
    username=1wmyb wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ieb shared-users=2 \
    username=1wzc7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wiq shared-users=2 \
    username=1w85f wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jfu shared-users=2 \
    username=1wbfq wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8e6 shared-users=2 \
    username=1w7yc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=pfg shared-users=2 \
    username=1w5bt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=djx shared-users=2 \
    username=1wpuq wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=m7a shared-users=2 \
    username=1wfpj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rwk shared-users=2 \
    username=1w6ma wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=z5i shared-users=2 \
    username=1wxz5 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=9p8 shared-users=2 \
    username=1wi3c wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=zxf shared-users=2 \
    username=1wjgv wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cbc shared-users=2 \
    username=1w2wq wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=asb shared-users=2 \
    username=1w6zu wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6nr shared-users=2 \
    username=1wdu3 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=edt shared-users=2 \
    username=1whz6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=4pq shared-users=2 \
    username=1wjmh wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=gre shared-users=2 \
    username=1w5qe wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=yf8 shared-users=2 \
    username=1w5re wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=vf5 shared-users=2 \
    username=1w252 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=axc shared-users=2 \
    username=1wn9r wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=h7p shared-users=2 \
    username=1w2wf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=qba shared-users=2 \
    username=1wkte wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=q8v shared-users=2 \
    username=1wt5i wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8e9 shared-users=2 \
    username=1wvqx wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7px shared-users=2 \
    username=1whrv wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=k3c shared-users=2 \
    username=1wwpt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=uam shared-users=2 \
    username=1wvkg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8mz shared-users=2 \
    username=1wvxs wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=k9v shared-users=2 \
    username=1wrx9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=767 shared-users=2 \
    username=1wxtb wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=tsm shared-users=2 \
    username=1wf6k wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=n3n shared-users=2 \
    username=1wv5u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=h84 shared-users=2 \
    username=1wf7y wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8q7 shared-users=2 \
    username=1w9re wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=vaz shared-users=2 \
    username=1wdkj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cig shared-users=2 \
    username=1wm2d wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=q26 shared-users=2 \
    username=1wbwf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=xgk shared-users=2 \
    username=2w9ip wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=9q6 shared-users=2 \
    username=2wbjr wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=atd shared-users=2 \
    username=2w2k8 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=k2a shared-users=2 \
    username=2wkk6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=36c shared-users=2 \
    username=2wsnd wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=i6a shared-users=2 \
    username=2wqyg wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=usg shared-users=2 \
    username=2wh7e wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=2xf shared-users=2 \
    username=2w2ig wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cz8 shared-users=2 \
    username=2wy9j wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=a2u shared-users=2 \
    username=2wamj wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=emt shared-users=2 \
    username=2w75a wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=kw3 shared-users=2 \
    username=2wrxr wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7df shared-users=2 \
    username=2w3ha wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7qt shared-users=2 \
    username=2wbes wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=y5r shared-users=2 \
    username=2wfp7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=3rh shared-users=2 \
    username=2w2hn wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cpr shared-users=2 \
    username=2w9hi wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7vz shared-users=2 \
    username=2wb55 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=avw shared-users=2 \
    username=2w4tw wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=me6 shared-users=2 \
    username=2waiy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=eiv shared-users=2 \
    username=2wcf8 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=yjw shared-users=2 \
    username=2wvtx wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=acu shared-users=2 \
    username=2wnks wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=gc3 shared-users=2 \
    username=2wr55 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ivv shared-users=2 \
    username=2w755 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=umu shared-users=2 \
    username=2wuji wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=fz6 shared-users=2 \
    username=2ws26 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cmy shared-users=2 \
    username=2wkvy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8by shared-users=2 \
    username=2wrm8 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=6bh shared-users=2 \
    username=2wqsd wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=3bn shared-users=2 \
    username=2w4j7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=fuf shared-users=2 \
    username=2wqrt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=38m shared-users=2 \
    username=2w4nx wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jyc shared-users=2 \
    username=2wcke wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=xes shared-users=2 \
    username=2wntf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=egu shared-users=2 \
    username=2wcp9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=uzs shared-users=2 \
    username=2wdjk wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=zj4 shared-users=2 \
    username=2wjrw wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ffs shared-users=2 \
    username=2wf7t wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=4vf shared-users=2 \
    username=2wyyf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rc7 shared-users=2 \
    username=2wexn wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=guk shared-users=2 \
    username=2wbax wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=upa shared-users=2 \
    username=2wims wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jf2 shared-users=2 \
    username=2wast wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jhc shared-users=2 \
    username=2wztp wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=c3j shared-users=2 \
    username=2wxy6 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=it2 shared-users=2 \
    username=2wxgk wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jme shared-users=2 \
    username=2w2wb wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=bik shared-users=2 \
    username=2wrgp wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=kje shared-users=2 \
    username=2ws7u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ed9 shared-users=2 \
    username=2wf7f wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=sk7 shared-users=2 \
    username=2wi8z wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7jb shared-users=2 \
    username=2wbwe wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hrr shared-users=2 \
    username=2waxa wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=aqn shared-users=2 \
    username=2wf7m wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=fmi shared-users=2 \
    username=2wxen wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=i2p shared-users=2 \
    username=2wwvh wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ddz shared-users=2 \
    username=2wi95 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=edy shared-users=2 \
    username=2wac2 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=yny shared-users=2 \
    username=2wrrc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=4jc shared-users=2 \
    username=3wd4e wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=kv9 shared-users=2 \
    username=3wchn wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=daq shared-users=2 \
    username=3wrrk wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=kh4 shared-users=2 \
    username=3wbej wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=7vv shared-users=2 \
    username=3w8ku wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ydi shared-users=2 \
    username=3wjpr wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=avh shared-users=2 \
    username=3wem9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=nwx shared-users=2 \
    username=3wiq2 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8ix shared-users=2 \
    username=3wt7u wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5mf shared-users=2 \
    username=3wf3h wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5xp shared-users=2 \
    username=3wfbi wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=abm shared-users=2 \
    username=3wwsr wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=s4n shared-users=2 \
    username=3wbqs wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=t26 shared-users=2 \
    username=3w5cf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cyq shared-users=2 \
    username=3wg8a wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=v68 shared-users=2 \
    username=3wnrc wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wcw shared-users=2 \
    username=3wwtd wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hy9 shared-users=2 \
    username=3w8ny wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=bww shared-users=2 \
    username=3wssp wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=eqm shared-users=2 \
    username=3w348 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ash shared-users=2 \
    username=3wb6v wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=uuf shared-users=2 \
    username=3whed wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=637 shared-users=2 \
    username=3wfhw wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=kgq shared-users=2 \
    username=3wxgw wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=9d3 shared-users=2 \
    username=3wmxp wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=uev shared-users=2 \
    username=3wj5m wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=wv9 shared-users=2 \
    username=3w23p wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=v2d shared-users=2 \
    username=3w267 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=gkm shared-users=2 \
    username=3w74z wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=sh4 shared-users=2 \
    username=3w7j2 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=2kg shared-users=2 \
    username=3w784 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ms7 shared-users=2 \
    username=3wptm wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=bqj shared-users=2 \
    username=3wvtn wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=uvt shared-users=2 \
    username=3wqtt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=rgi shared-users=2 \
    username=3wt9s wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=xnt shared-users=2 \
    username=3w2eb wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=gih shared-users=2 \
    username=3w4wt wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=fgh shared-users=2 \
    username=3wyri wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=fph shared-users=2 \
    username=3wrx4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=a89 shared-users=2 \
    username=3wnct wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=cdx shared-users=2 \
    username=3wfdy wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5j7 shared-users=2 \
    username=3w5s9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=3i4 shared-users=2 \
    username=3wu6c wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=fnz shared-users=2 \
    username=3wbj7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=r7h shared-users=2 \
    username=3wygr wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hev shared-users=2 \
    username=3w3i4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=g7t shared-users=2 \
    username=3wg7b wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=dyt shared-users=2 \
    username=3wgwv wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=a2s shared-users=2 \
    username=3wjih wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=hrv shared-users=2 \
    username=3w8x9 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=4e5 shared-users=2 \
    username=3w2w4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=vuq shared-users=2 \
    username=3w2f5 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ht8 shared-users=2 \
    username=3wwy5 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=8yy shared-users=2 \
    username=3whw7 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=d3w shared-users=2 \
    username=3wibf wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=jk4 shared-users=2 \
    username=3wr4r wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=nwb shared-users=2 \
    username=3wbe4 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=u2n shared-users=2 \
    username=3wea2 wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=vmm shared-users=2 \
    username=3wcps wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=5jh shared-users=2 \
    username=3waby wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password="john " shared-users=3 \
    username=john wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password="pure " shared-users=3 \
    username=purity wireless-enc-algo=none wireless-enc-key="" wireless-psk=\
    ""
add customer=admin disabled=no ipv6-dns=:: password=ola shared-users=3 \
    username=apex wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password="4q " shared-users=\
    unlimited username=ope wireless-enc-algo=none wireless-enc-key="" \
    wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=stema shared-users=3 \
    username=stem wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
add customer=admin disabled=no ipv6-dns=:: password=ade shared-users=2 \
    username=ade wireless-enc-algo=none wireless-enc-key="" wireless-psk=""
