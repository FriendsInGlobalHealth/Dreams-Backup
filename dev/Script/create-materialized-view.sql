DROP TABLE app_dream_vw_agyw_prev;

CREATE TABLE app_dream_vw_agyw_prev
(
   provincia_id int,
   distrito_id int DEFAULT 0 NOT NULL,
   bairro_id int DEFAULT 0,
   ponto_entrada int NOT NULL,
   organizacao_id int DEFAULT 0,
   data_registo varchar(25),
   beneficiario_id int DEFAULT 0 NOT NULL,
   nui varchar(61),
   sexo_id smallint,
   idade_registo int,
   idade_actual int,
   faixa_registo varchar(5) NOT NULL,
   faixa_actual varchar(5) NOT NULL,
   data_nascimento varchar(50),
   com_quem_mora varchar(150),
   e_orfa int,
   sustenta_casa int DEFAULT 0,
   vai_escola int,
   tem_deficiencia int,
   tipo_diciciencia varchar(250),
   foi_casada int DEFAULT 0,
   esteve_gravida int,
   tem_filhos int,
   gravida_amamentar int DEFAULT 0,
   trabalha int,
   teste_hiv int,
   vitima_exploracao_sexual int,
   migrante int,
   vitima_trafico varchar(10),
   sexualmente_activa int,
   relacoes_multiplas_cocorrentes int,
   vitima_vbg int,
   trabalhadora_sexo int,
   abuso_alcool_drogas int,
   historico_its int,
   area_servico_id int DEFAULT 0,
   servico_id int DEFAULT 0,
   sub_servico_id int DEFAULT 0,
   pacote_servico_id int DEFAULT 0,
   ponto_entrada_id int,
   localizacao_id int DEFAULT 0,
   data_servico varchar(25),
   provedor varchar(250),
   observacoes varchar(250),
   servico_status int DEFAULT 1,
   vulneravel int
);

SET @@SESSION.sql_mode='NO_ZERO_DATE,NO_ZERO_IN_DATE';

INSERT INTO app_dream_vw_agyw_prev
select *,
   if (sexo_id = 2 
      and((teste_hiv is not null and teste_hiv < 2)
      or relacoes_multiplas_cocorrentes = 1 
      or tem_deficiencia = 1
      or vitima_vbg = 1
      or abuso_alcool_drogas = 1
      or historico_its = 1
      or vitima_exploracao_sexual = 1
      or ((sustenta_casa = 1 or gravida_amamentar= 1 or esteve_gravida = 1 or foi_casada = 1 or tem_filhos = 1 or migrante = 1 or vitima_trafico = 1) and idade_actual < 20)
      or ((sexualmente_activa = 1 or vai_escola = 0 or (trabalha is not null and trabalha <> 0) or e_orfa = 1) and idade_actual < 18)
      or (trabalhadora_sexo = 1 and idade_actual > 17)),
      1,0) vulneravel
from
(
   select distinct pr.id provincia_id,
        dt.district_code distrito_id,
        b.id bairro_id,
        he.ponto_entrada,
        dp.id organizacao_id,
        he.criado_em data_registo,
        he.id beneficiario_id,
        concat(dt.cod_distrito,'/',he.member_id) nui,
        he.emp_gender sexo_id,
        floor(datediff(he.criado_em,coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) idade_registo,
        floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) idade_actual,
        if(floor(datediff(he.criado_em,coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 9 and 14,'9-14',if(floor(datediff(he.criado_em,coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 15 and 19,'15-19',if(floor(datediff(he.criado_em,coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 20 and 24,'20-24',if(floor(datediff(he.criado_em,coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 25 and 29,'25-29','NA')))) faixa_registo,
        if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 9 and 14,'9-14',if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 15 and 19,'15-19',if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 20 and 24,'20-24',if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 25 and 29,'25-29','NA')))) faixa_actual,
        he.emp_birthday data_nascimento,
        he.encarregado_educacao com_quem_mora,
        he.orphan e_orfa,
        he.house_sustainer sustenta_casa,
        he.estudante vai_escola,
        he.deficiencia tem_deficiencia,
        he.deficiencia_tipo tipo_diciciencia,
        he.married_before foi_casada,
        he.gravida esteve_gravida,
        he.filhos tem_filhos,
        he.pregant_or_breastfeed gravida_amamentar,
        he.employed trabalha,
        he.tested_hiv teste_hiv,
        he.vbg_exploracao_sexual vitima_exploracao_sexual,
        he.vbg_migrante_trafico migrante,
        he.vbg_vitima_trafico vitima_trafico,
        he.vbg_sexual_activa sexualmente_activa,
        he.vbg_relacao_multipla relacoes_multiplas_cocorrentes,
        he.vbg_vitima vitima_vbg,
        he.vbg_sex_worker trabalhadora_sexo,
        he.alcohol_drugs_use abuso_alcool_drogas,
        he.sti_history historico_its,
        ts.id area_servico_id,
        s.id servico_id,
        ss.id sub_servico_id,
        tabela.nivel_intervencao pacote_servico_id,
        dbs.ponto_entrada ponto_entrada_id,
        us.id localizacao_id,
        if (dbs.criado_em >= '2021-08-23', STR_TO_DATE(dbs.data_beneficio,'%d/%m/%Y'), -- Data de entrada deste campo num único formato (versão 3.2 de 23/08)
         if(dbs.actualizado_em >= '2021-08-23' && STR_TO_DATE(dbs.data_beneficio,'%m/%d/%Y') > dbs.criado_em, STR_TO_DATE(dbs.data_beneficio,'%d/%m/%Y'),
         coalesce(STR_TO_DATE(replace(dbs.data_beneficio,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(dbs.data_beneficio,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(dbs.data_beneficio,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(dbs.data_beneficio,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(dbs.data_beneficio,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(dbs.data_beneficio,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(dbs.data_beneficio,'.','/'),'%Y/%m/%d'),STR_TO_DATE(replace(dbs.data_beneficio,',','/'),'%Y/%m/%d'),STR_TO_DATE(replace(dbs.data_beneficio,' ','/'),'%Y/%m/%d'),STR_TO_DATE(replace(dbs.data_beneficio,'.','/'),'%Y/%d/%m'),STR_TO_DATE(replace(dbs.data_beneficio,',','/'),'%Y/%d/%m'),STR_TO_DATE(replace(dbs.data_beneficio,' ','/'),'%Y/%d/%m'),STR_TO_DATE(dbs.data_beneficio,'%m-%d-%Y'),STR_TO_DATE(dbs.data_beneficio,'%d %M %Y'),dbs.data_beneficio))) data_servico,
        dbs.provedor provedor,
        dbs.description observacoes,
        dbs.status servico_status
   from hs_hr_employee he
   LEFT JOIN hs_hr_province pr ON (pr.id = he.provin_code) -- tabela de registo de raparigas e rapazes por provincia
   INNER JOIN hs_hr_district dt ON (pr.id = dt.province_code AND dt.district_code = he.district_code)  -- tabela de registo de raparigas e rapazes por distrito
   left join app_dream_bairros b on he.bairro_id=b.id
   LEFT JOIN user u ON u.id = he.criado_por -- tabela de usuarios registados
   LEFT JOIN app_dream_parceiros dp ON dp.id = coalesce(he.parceiro_id,u.parceiro_id) -- tabela de parceiros Dreams
   LEFT JOIN app_dream_parceiros_tipo pt ON pt.id=dp.parceria_id -- tabela por tipo de parceiro (CM/US/ES)
   left join app_dream_beneficiario_servicos dbs on he.id=dbs.beneficiario_id
   left join app_dream_servicos_sub ss on dbs.sub_servico_id=ss.id -- and dbs.servico_id=ss.servico_id
   left join app_dream_servicos s on dbs.servico_id=s.id
   left join app_dream_tipo_servicos ts on s.servico_id=ts.id
   left join
   (
     select s.id servico_id, 
       fe.id as faixa_id,
       s.name servico,
       fe.faixa_etaria,
       ni.id nivel_intervencao
     from app_dream_servicos s
     left join app_dream_faixa_servico fs on fs.servico_id=s.id
     left join app_dream_faixa_etaria fe on fs.faixa_id=fe.id
     left join app_dream_nivel_intervensao ni on fe.nivel_intervencao_id=ni.id
   ) tabela on (tabela.servico_id=s.id and tabela.faixa_etaria=if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 9 and 14,'09-14',if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 15 and 19,'15-19',if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 20 and 24,'20-24',if(floor(datediff(now(),coalesce(STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%d/%m/%Y'),STR_TO_DATE(replace(he.emp_birthday,'.','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,',','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,' ','/'),'%m/%d/%Y'),STR_TO_DATE(replace(he.emp_birthday,'-','/'),'%m/%d/%Y')))/365) between 25 and 29,'25-29','NA')))))
   left join app_dream_us us on dbs.us_id=us.id
   where he.emp_status=1
) a;