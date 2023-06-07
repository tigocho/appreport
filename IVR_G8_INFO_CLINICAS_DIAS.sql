USE [GOCHO_PRE_PRODUCCION]
GO

/****** Object:  Table [dbo].[IVR_G8_INFO_CLINICAS_DIAS]    Script Date: 29/05/2023 4:28:02 p. m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[IVR_G8_INFO_CLINICAS_DIAS] (
  [icd_id] [int] IDENTITY(1,1) NOT NULL,
  [icd_cli_id] [int] NOT NULL,
	[icd_cli_cod_esp] [int] NOT NULL,
	[icd_cli_cedula_medico] [varchar](100) NOT NULL,
	[icd_dia] INT NOT NULL,
	[icd_horario_inicio_manana] [varchar](100) NULL,
	[icd_horario_fin_manana] [varchar](100) NULL,
	[icd_horario_inicio_tarde] [varchar](100) NULL,
	[icd_horario_fin_tarde] [varchar](100) NULL,
	[icd_cli_lugar_facturacion] [varchar](255) NULL,
	[icd_cli_lugar_atencion] [varchar](255) NULL,
	[icd_cli_observacion] [varchar](255) NULL,
	[icd_activo] BIT NOT NULL DEFAULT(1),
	[icd_deleted_at] [datetime] NULL,
	[icd_created_at] [datetime] NOT NULL,
	[icd_updated_at] [datetime] NOT NULL,
	CONSTRAINT [PK_IVR_G8_INFO_CLINICAS_DIAS] PRIMARY KEY CLUSTERED 
(
	[icd_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
