# Octocat

**Description:**
> 코딩, 마크다운 작성 등 다재다능한 문어발 고양이 ^ↀᴥↀ^


## Write-up

메인 페이지에 접근해보면 MarkDown 문법 몇 가지가 소개되어 있고 별다른 기능을 볼 수 없습니다.  
다른 기능이나 페이지를 더 알아보기 위해서 robots.txt 파일에 접근하여 확인해보면 다음과 같이 /admin 디렉터리가 Disallow 되어 있는 것을 볼 수 있습니다.

robots.txt:  
```
User-agent: *
Disallow: /admin
```
